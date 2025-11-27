<?php

namespace App\Voyager\Widgets;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\News;

class NewsDimmer extends BaseDimmer
{
    protected $config = [];

    public function run()
    {
        // Đếm số bài viết chưa đăng (published = 0)
        $count = News::where('is_featured', 0)->count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => "{$count} bài viết",
            'text'   => "Có {$count} bài viết chưa được xuất bản trong hệ thống.",
            'button' => [
                'text' => 'Xem tất cả bài viết',
                'link' => route('voyager.news.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(News::class));
    }
}
