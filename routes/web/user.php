<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {


    Route::post('/users/status', [UserController::class, 'status'])
        ->name('users.status');

    Route::resource('/users', UserController::class);

});
