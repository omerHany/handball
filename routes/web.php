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

// Route::get('/', function () {
//     return view('welcome');
// });     '/تسجيل_الدخول'

// Route::view('/','parant');
// Route::view('/', 'home');


// // Route::prefix('handball')->group(function(){
Route::prefix('/')->group(function () {
    Route::get('/تسجيل_الدخول', [AuthController::class, 'showLogin'])->name('loginn');
    Route::post('/تسجيل_الدخول', [AuthController::class, 'login'])->name('login');
});
Route::prefix('/admin')->middleware('auth:admin')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::resource('news',NewsController::class);
        Route::resource('/form_edit',FormController::class);
        Route::resource('/clubs', AdminController::class,);
    });
    Route::resource('/players', PlayerController::class);
    Route::resource('/manegars', ManegarController::class);
    Route::get('/تغير_كلمة_السر', [AuthController::class, 'editpassword'])->name('changepass');
    Route::put('/تغير_كلمة_السر', [AuthController::class, 'updatepassword'])->name('updatepass');
    Route::get('/تسجيل_الخروج', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/الرئيسية', [FrontController::class, 'home'])->name('homee');
// Route::get('/الاخبار', [NewsController::class]);
Route::get('/الاخبار/{news}', [NewsController::class,'show'])->name('showw');


Route::view('/من_نحن', 'form.about')->name('aboutt');
Route::view('/الاندية', 'form.cup')->name('cupp');
Route::view('/البطولات', 'form.btolat')->name('btolatt');
Route::view('/لجان_الاتحاد', 'form.legan')->name('legann');
    
    // Route::view('/اضافة_لاعب', 'loginn.playerlogin')->name('playerloginn');
    // Route::view('/اضافة_اداري', 'loginn.manegarlogin')->name('manegarloginn');
    

// });
