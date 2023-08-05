<?php

namespace App\Providers;

use App\Models\Session;
use App\Observers\SessionObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        Session::observe(SessionObserver::class);
    }
}
