<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

use App\Models\Service;
use App\Models\HomeType;
use App\Models\NewCategory;
use App\Models\Consulting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        // Tạo biến global
        View::share('MenuServices', Service::select('name', 'slug')
                                        ->where('is_featured', 1)->get());
        View::share('MenuHomeType', HomeType::select('id', 'name', 'slug')
                                        ->where('is_featured', 1)->get());
        View::share('MenuNewCategory', NewCategory::select('id', 'name', 'slug')
                                        ->where('is_featured', 1)->get());
        View::share('MenuConsulting', Consulting::select('id', 'title', 'slug', 'summary')
                                        ->where('is_featured', 1)->get());
                                                                       
    }
}
