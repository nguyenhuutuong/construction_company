<?php

namespace App\Voyager\Widgets;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\HomeTypeDetail;

class HouseDimmer extends BaseDimmer
{
    protected $config = [];

    public function run()
    {
        $count = HomeTypeDetail::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-home', // icon phù hợp hơn
            'title'  => "Tổng {$count} dự án",
            'text'   => "Hiện tại hệ thống đang có {$count} dự án trong hệ thống.",
            'button' => [
                'text' => 'Xem tất cả dự án',
                'link' => route('voyager.home-type-details.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(HomeTypeDetail::class));
    }
}
