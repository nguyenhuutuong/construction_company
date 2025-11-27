<?php

namespace App\Voyager\Widgets;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\Message;

class MessageDimmer extends BaseDimmer
{
    protected $config = [];

    public function run()
    {
        $count = Message::where('is_read', 0)->count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-chat',
            'title'  => "{$count} tin nhắn",
            'text'   => "Có tổng cộng {$count} tin nhắn chưa trả lời trong hệ thống.",
            'button' => [
                'text' => 'Xem tất cả tin nhắn',
                'link' => route('voyager.messages.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Message::class));
    }
}
