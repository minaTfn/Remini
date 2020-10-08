<?php

namespace App\Providers;

use App\Models\Delivery;
use App\Models\User;
use App\Policies\DeliveryPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Delivery::class => DeliveryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-user', [UserPolicy::class, 'manage']);
        Gate::define('manage-delivery', [DeliveryPolicy::class, 'manage']);
        Gate::define('create-delivery', [DeliveryPolicy::class, 'create']);
    }
}
