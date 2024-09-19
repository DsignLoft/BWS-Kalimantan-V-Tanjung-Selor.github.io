<?php

namespace App\Providers;

use App\View\Composers\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Paginator::defaultView('layouts.paginate');
        View::composer(['layouts.header'], Category::class);
        // $this->app->bind('path.public', function () {
        //     return base_path() . '/../public_html/w2p_admin/public';
        // });
    }
}
