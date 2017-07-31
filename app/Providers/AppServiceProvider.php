<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\categories;
use App\branches;
use Illuminate\Support\Facades\View;
use App\product;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $ct = categories::all();
        $br = branches::all();
        $pr = product::all();
        View::share('ctslide', $ct);
        View::share('brslide',$br);
        View::share('sharepr',$pr);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
