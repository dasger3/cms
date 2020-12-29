<?php

namespace App\Providers;

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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-pages', function($user){
           return $user->hasAnyRoles(['admin','author']);
        });
        Gate::define('edit-pages', function($user){
           return $user->hasAnyRoles(['admin', 'author']);
        });
        Gate::define('delete-pages', function($user){
           return $user->hasRole('admin');
        });
        Gate::define('manage-categories', function($user){
           return $user->hasAnyRoles(['admin','author']);
        });
        Gate::define('edit-categories', function($user){
           return $user->hasAnyRoles(['admin', 'author']);
        });
        Gate::define('delete-categories', function($user){
           return $user->hasRole('admin');
        });

    }
}
