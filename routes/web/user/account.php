<?php

use App\Http\Controllers\User\EndSessionController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('', [ProfileController::class, 'index'])->name('profile');

Route::post('/end-session/{session}', [EndSessionController::class, 'endOneSession'])->name('endOneSession');
Route::post('/end-all-sessions', [EndSessionController::class, 'endAllSession'])->name('endAllSession');
Route::post('/end-all-sessions-except-one', [EndSessionController::class, 'endAllSessionExceptOne'])->name('endAllSessionExceptOne');

