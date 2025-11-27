<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Models\HomeTypeDetail;

class HomeTypeDetailController extends VoyagerBaseController
{
    public function userIndex(Request $request) {
        
        if($request->slug == 'all'){
            $projects = HomeTypeDetail::where('is_featured', 1)->paginate(6);
            return view('projects.index', compact('projects'));
        }
        if($request->status == 'hoan-thanh' || $request->status == 'thi-cong'){
            $status = $request->status == 'hoan-thanh' ? 1 : 0;
            $projects = HomeTypeDetail::where('status', $status)
                                        ->where('is_featured', 1)->paginate(6);      
            return view('projects.index', compact('projects'));
        }

        $projects = HomeTypeDetail::where('home_type_id', $request->id)->where('is_featured', 1)->paginate(6);
        return view('projects.index', compact('projects'));

    }

    public function userShow(Request $request, $slug){
        $project = HomeTypeDetail::where('slug', $slug)
                                    ->where('is_featured', 1)->first();
        $projects = HomeTypeDetail::select('name', 'slug', 'image', 'created_at')
                                    ->where('home_type_id', $project->home_type_id)
                                    ->where('id', '!=', $project->id)
                                    ->where('is_featured', 1)
                                    ->orderBy('created_at', 'desc')
                                    ->take(4)
                                    ->get();
        return view('projects.show',compact('project', 'projects'));
    }
}
