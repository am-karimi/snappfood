<?php



use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts/dashboard');
    })->name('dashboard');
});

require __DIR__ . '/web/category.php';
require __DIR__ . '/web/discount.php';
require __DIR__ . '/web/seller.php';
require __DIR__ . '/web/admin.php';
require __DIR__ . '/web/food.php';
require __DIR__ . '/web/user.php';
require __DIR__ . '/web/workingHours.php';
require __DIR__ . '/web/order.php';
