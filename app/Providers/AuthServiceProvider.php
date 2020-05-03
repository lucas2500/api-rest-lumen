<?php

namespace App\Providers;

use App\Usuario;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth;
use Firebase\JWT\JWT;

class AuthServiceProvider extends ServiceProvider
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
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            if (!$request->hasHeader('Authorization')) {
                return null;
            } else {
                $AuthorizationHeader = $request->header('Authorization');

                $token = str_replace('Bearer ', '', $AuthorizationHeader);
                $DataAuth = JWT::decode($token, env('JWT_KEY'), ['HS256']);
                // return new GenericUser(['email' => $DataAuth]);

                return Usuario::where('email', $DataAuth->email)->first();
            } 
        });
    }
}
