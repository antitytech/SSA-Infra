<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LinkedInController;
use App\Http\Controllers\UsersController;
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



Route::group(['middleware' => 'auth:web'], function () {

    Route::middleware('VerifyEmail')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('dashboard');
        Route::get('/my-company', [UsersController::class, 'company'])->name('company');
        Route::get('/my-platforms', [UsersController::class, 'platforms'])->name('platforms');
        Route::get('/my-projects', [UsersController::class, 'projects'])->name('projects');
        Route::get('/my-investments', [UsersController::class, 'investments'])->name('investments');
        Route::get('/ongoing-transactions', [UsersController::class, 'transactions'])->name('transactions');
        Route::get('/investment-opportunities', [UsersController::class, 'opportunities'])->name('opportunities');
        Route::get('/request-management', [UsersController::class, 'management'])->name('management');
    });


    Route::get('/verify-email', [UsersController::class, 'email'])->name('verify.email');

    Route::prefix('user')->group(function () {
        Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
        Route::get('/profile', [UsersController::class, 'profile'])->name('profile');
    });
});

Route::post('/user/authenticate', [UsersController::class, 'authenticate']);
Route::post('/save', [UsersController::class, 'store'])->name('store');
Route::get('/user/forget-password', [UsersController::class, 'forget']);
Route::get('/user/register', [UsersController::class, 'register']);
Route::get('/user/login', [UsersController::class, 'signin'])->name('login');


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback/', [GoogleController::class, 'handleGoogleCallback']);


Route::get('/auth/linkedin', [LinkedInController::class, 'redirectToLinkedin']);
Route::get('/auth/linkedin/callback/', [LinkedInController::class, 'handleLinkedinCallback']);







Route::group(['middleware' => 'auth:admin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/all-users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/platforms', [AdminController::class, 'platforms'])->name('admin.platforms');
        Route::get('/projects', [AdminController::class, 'projects'])->name('admin.projects');
        Route::get('/investments', [AdminController::class, 'investments'])->name('admin.investments');
        Route::get('/ongoing-transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
        Route::get('/investment-opportunities', [AdminController::class, 'opportunities'])->name('admin.opportunities');
        Route::get('/request-management', [AdminController::class, 'management'])->name('admin.management');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    });
});

Route::post('/admin/authenticate', [AdminController::class, 'authenticate']);
Route::post('/admin/save', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/forget-password', [AdminController::class, 'forget']);
Route::get('/admin/login', [AdminController::class, 'signin'])->name('admin.login');

Route::get('/user-status-active/{id}', [AdminController::class, 'status1']);
Route::get('/user-status-block/{id}', [AdminController::class, 'status0']);
