<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

use App\Models\HomeType;

class HomeTypeController extends VoyagerBaseController
{
    public function userShow(Request $request, $id){
        if($request->slug == 'all'){
            $home_types = HomeType::where('is_featured', 1)->paginate(6);
            return view('models.index', compact('home_types'));
        }
        $home_type = HomeType::where('slug', $request->slug)
                            ->where('is_featured', 1)->first();
        return view('projects.show',compact('home_type'));
    }
}
