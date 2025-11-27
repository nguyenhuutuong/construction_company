<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Service;
use App\Models\HomeTypeDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $banner = Banner::where('status', 1)->first();
        $services = Service::where('is_featured', 1)->get();
        $projects = HomeTypeDetail::where('status', 1)
                                        ->where('is_featured', 1)->paginate(6); 
        return view('home', compact('banner', 'services', 'projects'));
    }
}
