<?php

namespace App\Providers;

use App\Models\Theme;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //check if the app is running in production... if so force it to use https

        if(env('app.env') === 'production'){
            //force any links created to use https
            URL::forceScheme('https');
        }


        //View::composer();
        View::composer(['layouts.app'], function ($view) {
            //pass data to the view
            $themes = Theme::all();

            $view->with('themes', $themes);
        });

    }
}
