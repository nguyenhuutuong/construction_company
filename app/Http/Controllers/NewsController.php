<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Models\News;

class NewsController extends VoyagerBaseController
{
    public function userIndex(Request $request) {
        $hotNews = News::select('title', 'slug', 'image', 'published_at')
               ->where('is_featured', 1)
               ->orderBy('published_at', 'desc')
               ->take(2)
               ->get();
        if($request->slug == 'all'){
            $news = News::select('id', 'title', 'slug', 'image', 'summary', 'published_at')
                        ->where('is_featured', 1)->paginate(6);
            return view('news.index', compact('news', 'hotNews'));
        }
        $news = News::select('id', 'title', 'slug', 'image', 'summary', 'published_at')
                     ->where('new_category_id', $request->id)
                     ->where('is_featured', 1)->paginate(6);
        return view('news.index', compact('news', 'hotNews'));

    }

    public function userShow(Request $request, $slug){
        $news = News::where('slug', $slug)
                    ->where('is_featured', 1)
                    ->first();
        $hotNews = News::select('title', 'slug', 'image', 'published_at')
               ->where('is_featured', 1)
               ->orderBy('published_at', 'desc')
               ->take(2)
               ->get();
        return view('news.show', compact('news', 'hotNews'));
    }
}
