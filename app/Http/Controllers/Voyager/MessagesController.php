<?php

namespace App\Http\Controllers\Voyager;

use App\Models\Message;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyMessageMail;
use Exception;

class MessagesController extends VoyagerBaseController
{
    // GET BROWSE
    public function index(Request $request)
    {
        $slug = $this->getSlug($request);
        $dataType = \TCG\Voyager\Models\DataType::where('slug', '=', $slug)->first();

        $this->authorize('browse', app($dataType->model_name));

        // Eager load replies with the parent messages.
        $dataTypeContent = Message::whereNull('parent_id')
            ->with(['replies' => function ($query) {
                $query->orderBy('created_at', 'asc');
            }])
            ->withCount('replies')
            ->orderBy('replies_count', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        $view = 'voyager::messages.browse';
        if (view()->exists("vendor.voyager.{$slug}.browse")) {
            $view = "vendor.voyager.{$slug}.browse";
        }

        return view($view, compact('dataType', 'dataTypeContent'));
    }

    // POST a reply
    public function reply(Request $request)
    {
        $request->validate([
            'parent_id' => 'required|exists:messages,id',
            'message'   => 'required|string',
        ]);

        $parentMessage = Message::findOrFail($request->parent_id);

        $reply = new Message();
        $reply->parent_id = $parentMessage->id;
        $reply->message = $request->message;
        $reply->is_read = true;

        $adminUser = auth()->user();
        $reply->name = $adminUser->name;
        $reply->email = $adminUser->email;
        $reply->phone = '';

        $reply->save();

        $parentMessage->is_read = true;
        $parentMessage->save();

        // Send email notification to the user
        try {
            Mail::to($parentMessage->email)->send(new ReplyMessageMail($parentMessage, $reply));
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return redirect()->route('voyager.messages.index')->with([
                'message'    => "Reply saved, but failed to send email: " . $e->getMessage(),
                'alert-type' => 'error',
            ]);
        }

        return redirect()->route('voyager.messages.index')->with([
            'message'    => "Successfully replied and sent email.",
            'alert-type' => 'success',
        ]);
    }
}
