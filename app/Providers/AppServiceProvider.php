<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        $categories = Category::whereNotNull('parent_id')->where('status','active')->get();
        $parent_categories = Category::whereNull('parent_id')->where('status','active')->get();
        $brands = Brand::where('status','active')->get();

        view()->share([
            'categories' => $categories,
            'parent_categories' => $parent_categories,
            'brands' => $brands,
        ]);

    }
}
