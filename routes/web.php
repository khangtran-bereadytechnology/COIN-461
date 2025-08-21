<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

//route hiện view đăng ký
Route::get('/auth/signup', [AuthController::class, 'showSignupForm'])->name('auth.showSignup');
//route xử lý đăng ký
Route::post('/auth/signup', [AuthController::class, 'signUp'])->name('auth.signup');
//route hiện view đăng nhập
Route::get('/auth/signin', [AuthController::class, 'showSigninForm'])->name('auth.showSignin');
//route xử lý đăng nhập
Route::post('/auth/signin', [AuthController::class, 'signIn'])->name('auth.signin');
//route xử lý đăng xuất
Route::post('/auth/signout', [AuthController::class, 'signOut'])->name('auth.signout');
