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
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

//guest
Route::group(['middleware' => 'guest'], function(){
    Route::get('/admin', [App\Http\Controllers\Admin\AdminLoginController::class, 'index'])->name('adminlogin.index');
    Route::post('/admin', [App\Http\Controllers\Admin\AdminLoginController::class, 'login'])->name('adminlogin.login');
});

//user auth route
Auth::routes(['verify' => true]);
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//admin auth route
Route::group(['middleware'=> 'auth:admin','prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/logout', [App\Http\Controllers\Admin\AdminLoginController::class, 'logout'])->name('adminlogout');
});
