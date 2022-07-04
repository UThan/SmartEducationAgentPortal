<?php

namespace App\Providers;

use App\Models\User;
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

        Gate::define('make-payment',function(User $user){
            return $user->role_id === 3;
        });

        Gate::define('view-partner',function(User $user){
            return $user->role_id > 1;
        });

        Gate::define('view-member',function(User $user){
            return $user->role_id === 3;
        });

        Gate::define('view-setting',function(User $user){
            return $user->role_id === 3;
        });

        
    }
}
