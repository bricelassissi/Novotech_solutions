<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
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

// Route::get('/test', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/account/register', [AccountController::class, 'registration'])->name('account.register');
Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
Route::post('/account/process-register', [AccountController::class, 'userRegistration'])->name('account.userRegistration');
Route::post('/account/process-login', [AccountController::class, 'authentification'])->name('account.processLogin');
Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
// Route::get('/', [HomeController::class, 'index']);
