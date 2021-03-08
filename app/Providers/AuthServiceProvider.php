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

        //

        Gate::define('admin', function ($user) {
            if ($user->hasRole('admin')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('sabanas', function ($user) {
            if ($user->hasRole('sabanas')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('historial', function ($user) {
            if ($user->hasRole('historial')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('gris', function ($user) {
            if ($user->hasRole('gris')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('verde', function ($user) {
            if ($user->hasRole('verde')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('moto', function ($user) {
            if ($user->hasRole('moto')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('antiguo', function ($user) {
            if ($user->hasRole('antiguo')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('remolque', function ($user) {
            if ($user->hasRole('remolque')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('taxi', function ($user) {
            if ($user->hasRole('taxi')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('ruta', function ($user) {
            if ($user->hasRole('ruta')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('escolta', function ($user) {
            if ($user->hasRole('escolta')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('especial', function ($user) {
            if ($user->hasRole('especial')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('disca', function ($user) {
            if ($user->hasRole('disca')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('moto', function ($user) {
            if ($user->hasRole('moto')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('sistemas', function ($user) {
            if ($user->hasRole('sistemas')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('director', function ($user) {
            if ($user->hasRole('director')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('licencias', function ($user) {
            if ($user->hasRole('licencias')) {
                return true;
            }else{
                return false;
            }
        });
        Gate::define('verificarLinea', function ($user) {
            if ($user->hasRole('verificarLinea')) {
                return true;
            }else{
                return false;
            }
        });

    }
}
