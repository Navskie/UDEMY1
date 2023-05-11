<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\home\homeslideController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(adminController::class)->group(function () {
    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'profile')->name('admin.profile');
    
    Route::get('admin/edit-profile', 'editProfile')->name('edit.profile');
    Route::post('admin/store-profile', 'storeProfile')->name('store.profile');

    Route::get('admin/change-password', 'changePassword')->name('change.password');
    Route::post('admin/update-password', 'updatePassword')->name('update.password');
});

Route::controller(homeslideController::class)->group(function () {
    Route::get('home/slide', 'homeSlide')->name('home.slide');
    Route::post('update/slide', 'updateSlide')->name('update.slide');
});

require __DIR__.'/auth.php';
