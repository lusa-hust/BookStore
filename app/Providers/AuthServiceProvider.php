<?php

namespace App\Providers;

use App\Order;
use App\OrderRow;
use App\Policies\OrderPolicy;
use App\Policies\OrderRowPolicy;
use App\Policies\ReviewPolicy;
use App\Review;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Review::class => ReviewPolicy::class,
        Order::class => OrderPolicy::class,
        OrderRow::class => OrderRowPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
