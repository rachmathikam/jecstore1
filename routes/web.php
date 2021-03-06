<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SparepatController;
use App\Http\Controllers\KomponenController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LayananController;








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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return redirect()->route('login');
// });

Auth::routes();

// Route::middleware(['auth'])->group(function () {
//      Route::middleware(['user'])->group(function () {
//         Route::get('user', [UserController::class, 'index'])->name('user');
//         Route::get('user/profile', [UserController::class, 'profile']);
//     });

//     Route::get('/logout', function() {
//         Auth::logout();
//         return redirect('/');
//     });
// });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',                 [HomeController::class, 'index'])->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('teknisi', TeknisiController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('type', TypeController::class);
    Route::resource('sparepat', SparepatController::class);
    Route::resource('komponen', KomponenController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('layanans', LayananController::class);

});
Route::view('/','pages.frontend.home');
Route::view('abouts','pages.frontend.about');
Route::view('contacts','pages.frontend.contact');

