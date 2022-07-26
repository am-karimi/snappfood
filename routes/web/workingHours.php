<?php
use App\Http\Controllers\WorkingHoursController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('workingHours/index/{restaurant}',[WorkingHoursController::class,'index'])
        ->name('workingHours.index');
    Route::resource('workingHours', WorkingHoursController::class)->only('destroy','store');


});
