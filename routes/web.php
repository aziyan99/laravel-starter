<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('users', UserController::class);
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('setting/{setting}', [SettingController::class, 'update'])->name('setting.update.information');
    Route::put('setting/updateLogo/{setting}', [SettingController::class, 'updateLogo'])->name('setting.update.logo');
});
