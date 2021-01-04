<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWTGuard as JWTAuthJWTGuard;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Auth::extend('jwt', function ($app, $name, array $config) {
        //     // Return an instance of Illuminate\Contracts\Auth\Guard...

        //     return new JWTAuthJWTGuard([],Auth::createUserProvider($config['provider']),$request);
        // });
    }
    }

