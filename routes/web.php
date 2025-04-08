<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Auth as MiddlewareAuth;
use App\Http\Middleware\Guest as MiddlewareGuest;
use App\Http\Controllers\InvitationController;
use App\Livewire\Pages\Auth;
use App\Livewire\Pages\Guestbook;
use App\Livewire\Pages\Invitation;
use App\Livewire\Pages\Scan;

Route::controller(InvitationController::class)->group(function () {
    Route::get('/', 'invitation')->name('invitation');
    Route::get('/ticket/{id}', 'ticket')->name('ticket');
});

Route::prefix('admin')->group(function () {
    Route::middleware(MiddlewareAuth::class)->group(function () {
        Route::get('/guestbook', Guestbook::class)->name('admin.guestbook');
        Route::get('/invitation', Invitation::class)->name('admin.invitation');
        Route::get('/scan', Scan::class)->name('admin.scan');
        Route::get('/', function() {
            return redirect()->route('admin.guestbook');
        });
    });
    Route::middleware(MiddlewareGuest::class)->group(function () {
        Route::get('/login', Auth::class)->name('admin.login');
    });
});
