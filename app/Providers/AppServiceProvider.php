<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Settings;
use App\Models\Slider;
use App\Observers\CategoryObserve;
use App\Observers\GalleryObserve;
use App\Observers\SliderObserve;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Category::observe(CategoryObserve::class);
        Gallery::observe(GalleryObserve::class);
        Slider::observe(SliderObserve::class);

        View::composer('site.layouts.app',function ($view){
           $settings = Settings::query()->first();
           $view->with(compact('settings'));
        });

        Paginator::useBootstrapFive();
    }
}
