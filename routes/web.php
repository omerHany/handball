<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\FomrController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ManegarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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

Route::get('/', [FrontController::class, 'home'])->name('homee');

// الاخبار
Route::get('/الاخبار/{news}', [NewsController::class, 'show'])->name('showw');

Route::get('/الاندية', [FormController::class, 'cup'])->name('cupp');
Route::get('/البطولات', [FormController::class, 'btolat'])->name('btolatt');
Route::get('/لجان_الاتحاد',[FormController::class, 'legan'])->name('legann');
   

// تسجيل الدخول 
Route::prefix('/')->group(function () {
    Route::get('/تسجيل_الدخول', [AuthController::class, 'showLogin'])->name('loginn');
    Route::post('/تسجيل_الدخول', [AuthController::class, 'login'])->middleware('throttle:3,1')->name('login');
});
    // صفحات المشرف
Route::prefix('/admin')->middleware('auth:admin')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::resource('news', NewsController::class);
        Route::resource('/form_edit', FormController::class);
        Route::post('/Edit_forms',[FormController::class, 'update'])->name('editForms');
        Route::get('/players_admin', [PlayerController::class, 'index2'])->name('playeradmin');
        Route::get('/manegars_admin', [ManegarController::class, 'index2'])->name('manegaradmin');
        Route::resource('/clubs', AdminController::class,);
        Route::view('/تعديل_الاخبار','new.newEdit')->name('newss');
    });
    // dashboard
    Route::view('dashboard', 'parant')->name('dashboard');

    // اللاعبين
    Route::resource('/players', PlayerController::class);
// الادارين
    Route::resource('/manegars', ManegarController::class);
// تغير كلمه السر
    Route::get('/تغير_كلمة_السر', [AuthController::class, 'editpassword'])->name('changepass');
    Route::put('/تغير_كلمة_السر', [AuthController::class, 'updatepassword'])->name('updatepass');
// تسجيل الدخول
    Route::get('/تسجيل_الخروج', [AuthController::class, 'logout'])->name('logout');
});

