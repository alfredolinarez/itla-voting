<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

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

        Auth::viaRequest('custom-login', function() {
            $creds = env('ADMIN_USERNAME').':'.env('ADMIN_PASSWORD');
            $user_hash = session('user_hash');
            $username = session('username');
            if($user_hash && $username) {
                if(Hash::check($creds, $user_hash)) {
                    return [
                        'username' => env('ADMIN_USERNAME'),
                        'admin' => true,
                    ];
                }

                return [
                    'username' => $username,
                    'admin' => false,
                ];
            }

            return null;
        });
    }
}
