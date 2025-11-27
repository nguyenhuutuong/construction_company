<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'content' => 'required', // Mapped to the 'message' field in the database
        ]);

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->content, // The 'content' from the form is saved to the 'message' field
        ]);

        return redirect()->back()->with('success', 'Cảm ơn bạn đã gửi tin nhắn!');
    }
}
