<?php

namespace App\Providers;

use App\Services\Actions\Auth\LoginAction;
use App\Services\Actions\Auth\LogoutAction;
use App\Services\Actions\Auth\RegisterAction;
use App\Services\Actions\User\EndAllSessionAction;
use App\Services\Actions\User\EndAllSessionExceptOneAction;
use App\Services\Actions\User\EndOneSessionAction;
use App\Services\Actions\User\ProfileAction;
use App\Services\Contracts\Auth\LoginContract;
use App\Services\Contracts\Auth\LogoutContract;
use App\Services\Contracts\Auth\RegisterContract;
use App\Services\Contracts\User\EndAllSessionContract;
use App\Services\Contracts\User\EndAllSessionExceptOneContract;
use App\Services\Contracts\User\EndOneSessionContract;
use App\Services\Contracts\User\ProfileContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public array $singletons = [
        LoginContract::class=>LoginAction::class,
        RegisterContract::class=>RegisterAction::class,
        ProfileContract::class=>ProfileAction::class,
        LogoutContract::class=>LogoutAction::class,
        EndAllSessionContract::class=>EndAllSessionAction::class,
        EndOneSessionContract::class=>EndOneSessionAction::class,
        EndAllSessionExceptOneContract::class=>EndAllSessionExceptOneAction::class,
    ];

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
        //
    }
}
