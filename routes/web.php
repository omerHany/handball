<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ManegarController;
use App\Http\Controllers\PlayerController;
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

// Route::get('/', function () {
//     return view('welcome');
// });     '/تسجيل_الدخول'

// Route::view('/','parant');
// Route::view('/', 'home');


// // Route::prefix('handball')->group(function(){
Route::prefix('')->group(function(){
    Route::get('/تسجيل_الدخول',[AuthController::class, 'showLogin'])->name('loginn');

});
Route::prefix('/admin')->middleware('auth:admin')->group(function(){
    Route::view('/اضافة_خبر', 'loginn.new')->name('neww');
    Route::resource('players', PlayerController::class);
    Route::resource('manegars', ManegarController::class);
    Route::resource('clubs', ClubController::class);
});
    Route::view('/', 'form.home')->name('homee');
    Route::view('/من_نحن', 'form.about')->name('aboutt');
    Route::view('/الاندية', 'form.cup')->name('cupp');
    Route::view('/البطولات', 'form.btolat')->name('btolatt');
    Route::view('/لجان_الاتحاد', 'form.legan')->name('legann');
    
    // Route::view('/اضافة_لاعب', 'loginn.playerlogin')->name('playerloginn');
    // Route::view('/اضافة_اداري', 'loginn.manegarlogin')->name('manegarloginn');
    

// });
