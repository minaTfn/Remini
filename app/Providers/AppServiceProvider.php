<?php

namespace App\Providers;
use App\Models\Country;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        if ($this->app->isLocal()) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        date_default_timezone_set('Asia/Tehran');

        \View::composer('*', function ($view) {
            $countries = \Cache::rememberForever('countries', function () {
                return Country::pluck('title','id');
            });

            $view->with('countries', $countries);
        });

    }
}
