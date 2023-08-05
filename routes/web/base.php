<?php

use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => ''], function(){

    Route::get('/', function () {
        return view('welcome');
    });
    Route::group(['middleware' => ['guest']], function() {
        include ('auth/auth.php');
    });

    Route::group(['prefix' => 'user', 'middleware' => ['auth']], function()
    {
        include ('user/account.php');
    });
    Route::group(['prefix' => 'product', 'middleware' => ['auth']], function()
    {
        include ('user/product.php');
    });
    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});
