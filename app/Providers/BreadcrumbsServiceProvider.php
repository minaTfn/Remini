<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BreadcrumbsServiceProvider extends ServiceProvider {
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {

        require_once(base_path('routes/breadcrumbs.php'));

    }
}
