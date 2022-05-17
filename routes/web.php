<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvitationController;
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
    return view('index');
});

Route::controller(AuthController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/apps/auth', 'index')->name('login');
        Route::post('/apps/auth', 'auth');
    });
    Route::get('/logout', 'logout');
});

Route::get('/apps', function () {
    return view('apps.home');
})->middleware('auth');


Route::get('/invitation/{invite:uniqid}', [InvitationController::class, 'index']);
