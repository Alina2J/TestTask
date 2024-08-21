<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'main_page')->middleware('guest')->name('main-page');
    Route::get('/registration', 'reg_page')->middleware('guest')->name('reg-page');
    Route::get('/login', 'login_page')->middleware('guest')->name('login-page');
    Route::get('/profile', 'profile_page')->middleware('auth')->name('profile-page');
    Route::get('/single-card-page/{id}', 'single_card_page')->middleware('auth')->name('single-card-page');
    Route::get('/update-password', 'update_password_page')->middleware('auth')->name('update-password-page');
    Route::get('/applications-list', 'applications_list_page')->middleware('auth')->name('applications-list-page');
    Route::get('/forgot-password', 'forgot_password_page')->middleware('guest')->name('forgot-password-page');
    Route::get('/reset-password', 'reset_password_page')->middleware('guest')->name('password.reset');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/registration', 'registration')->middleware('guest')->name('registration');

    Route::post('/login', 'login')->middleware('guest')->name('login');
    Route::get('/logout', 'logout')->middleware('auth')->name('logout');

    Route::post('/forgot-password', 'forgot_password')->middleware('guest')->name('forgot-password');

    Route::post('/reset-password', 'reset_password')->middleware('guest')->name('password.update');

    Route::post('/update-password', 'update_password')->middleware('auth')->name('update-password');


    Route::get('/email/verify', 'notice')->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')->middleware(['auth', 'signed'])->name('verification.verify');
    Route::post('/email/verification-notification', 'send')->middleware('auth')->name('verification.send');
});

Route::controller(ApplicationController::class)->group(function () {
    Route::post('/add-application', 'add_application')->middleware('guest')->name('add-application');
    Route::post('/edit-application/{id}', 'edit_application')->middleware('auth')->name('edit-application');
    Route::delete('delete-application/{id}', 'delete_application')->middleware('auth')->name('delete-card');
});
