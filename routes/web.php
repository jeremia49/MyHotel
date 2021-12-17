<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HotelController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/login', [UserController::class, 'glogin'])->name('login');
Route::post('/login', [UserController::class, 'plogin'])->name('login.post');

Route::get('/register', [UserController::class, 'gregister'])->name('register');
Route::post('/register', [UserController::class, 'pregister'])->name('register.post');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/search', [RoomController::class, 'search'])->name('search');

Route::get('/hotel/{hotel}',[HotelController::class, 'show'])->name('hotel');
Route::post('/hotel/{hotel}/addreview',[HotelController::class, 'addReview'])->name('hotel.addreview');


Route::get('/admin',[Admin::class, 'index']);
Route::prefix('admin')->group(function () {
    Route::get('/tambahkota', [Admin::class, 'gaddkota'])->name('tambahkota');
    Route::post('/tambahkota', [Admin::class, 'paddkota'])->name('tambahkota.post');
    
    Route::get('/tambahhotel', [Admin::class, 'gaddhotel'])->name('tambahhotel');
    Route::post('/tambahhotel', [Admin::class, 'paddhotel'])->name('tambahhotel.post');
    
    Route::get('/tambahroom', [Admin::class, 'gaddroom'])->name('tambahroom');
    Route::post('/tambahroom', [Admin::class, 'paddroom'])->name('tambahroom.post');    
});


