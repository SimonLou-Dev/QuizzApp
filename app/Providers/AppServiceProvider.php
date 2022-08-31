<?php

namespace App\Providers;

use App\Blade\ViteAssetLoader;
use App\Facade\Code;
use App\Facade\Notify;
use App\Models\PersonalAccessToken;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ViteAssetLoader::class, function (Application $app){
            return new ViteAssetLoader(
                env('FRONT_DEBUG'),
                public_path('assets/manifest.json'),
                $app->get('cache.store')
            );
        });

        $this->app->singleton(Notify::class, function (Application $app){
            return new Notify();
        });

        $this->app->singleton(Code::class, function (Application $app){
            return new Code();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        Validator::extend('extended_boolean', 'App\Rules\ExtendedBoolean@passes');
    }
}
