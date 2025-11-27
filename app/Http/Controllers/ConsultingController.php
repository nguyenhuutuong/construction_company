<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Models\Consulting;

class ConsultingController extends VoyagerBaseController
{
    public function userIndex(Request $request) {
        
        return view('consulting.index');

    }

    public function userShow(Request $request, $slug){
        $consulting = Consulting::where('slug', $slug)->first();
        $hotConsultings = Consulting::select('title', 'slug', 'image', 'created_at')
                                ->where('is_featured', 1)
                                ->where('id', '!=', $consulting->id)
                                ->orderBy('created_at', 'desc')
                                ->take(4)
                                ->get();
        return view('consulting.show', compact('consulting', 'hotConsultings'));
    }
}
