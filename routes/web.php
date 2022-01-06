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

Route::GET('/', function () {
    return view('welcome');
});

Route::GET('/menu', function () {
    
    $dishes = App\Models\Dishes::orderBy('id','desc')->get();    
    $menu = App\Models\Menu::orderBy('id','desc')->get();

    return view('menu',['menu'=>$menu,'dishes'=>$dishes]);
});

Route::GET('/about', function () {
    return view('about');
});

Route::GET('/contact', function () {
    return view('contact');
});

//guest
Route::group(['middleware' => ['guest:web','guest:admin']], function(){
    Route::GET('/admin', [App\Http\Controllers\Admin\AdminLoginController::class, 'index'])->name('adminlogin.index');
    Route::POST('/admin', [App\Http\Controllers\Admin\AdminLoginController::class, 'login'])->name('adminlogin.login');
});

//user auth route
Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth','verified']], function(){
    Route::GET('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::PUT('/profile/name/{id}', [App\Http\Controllers\ProfileController::class, 'updateName'])->name('profile.update.name');
    Route::PUT('/profile/email/{id}', [App\Http\Controllers\ProfileController::class, 'updateEmail'])->name('profile.update.email');
    Route::PUT('/profile/password/{id}', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.update.password');

    Route::GET('/past_booking', [App\Http\Controllers\BookTableController::class, 'pastBookingIndex'])->name('booktable.pastBookingIndex');

    Route::GET('/book_table', [App\Http\Controllers\BookTableController::class, 'index'])->name('booktable.index');
    Route::POST('/book_table', [App\Http\Controllers\BookTableController::class, 'store'])->name('booktable.store');
    Route::GET('/ticket/{id}', [App\Http\Controllers\BookTableController::class, 'show'])->name('booktable.show');
});

//admin auth route
Route::group(['middleware'=> 'auth:admin','prefix'=>'admin','as'=>'admin.'], function(){
    Route::GET('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');

    Route::GET('/menu', [App\Http\Controllers\Admin\MenuController::class, 'index'])->name('menu.index');
    Route::POST('/menu', [App\Http\Controllers\Admin\MenuController::class, 'store'])->name('menu.store');
    Route::PUT('/menu/{id}', [App\Http\Controllers\Admin\MenuController::class, 'update'])->name('menu.update');
    Route::DELETE('/menu/{id}', [App\Http\Controllers\Admin\MenuController::class, 'destroy'])->name('menu.destroy');

    Route::POST('/dish', [App\Http\Controllers\Admin\MenuController::class, 'storeDish'])->name('dish.store');
    Route::PUT('/dish/{id}', [App\Http\Controllers\Admin\MenuController::class, 'updateDish'])->name('dish.update');
    Route::DELETE('/dish/{id}', [App\Http\Controllers\Admin\MenuController::class, 'destroyDish'])->name('dish.destroy');
    
    Route::GET('/bookings', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('booking.index');
    Route::GET('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::GET('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
    
    Route::GET('/admins', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
    Route::POST('/admins', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.store');
    
    Route::GET('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile.index');
    

    Route::POST('/logout', [App\Http\Controllers\Admin\AdminLoginController::class, 'logout'])->name('adminlogout');
});
