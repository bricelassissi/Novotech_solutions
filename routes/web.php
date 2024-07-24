<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageClientController;
use App\Http\Controllers\MetierController;
use App\Http\Controllers\PubliciteController;
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
Route::group(['middleware' => 'guest'], function(){
    Route::get('/compte/inscription', [AccountController::class, 'registration'])->name('account.register');
    Route::get('/compte/connexion', [AccountController::class, 'login'])->name('account.login');

});




Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
Route::post('/compte/process-inscription', [AccountController::class, 'userRegistration'])->name('account.userRegistration');
Route::post('/compte/process-connexion', [AccountController::class, 'authentification'])->name('account.processLogin');
Route::post('/compte/creer-artisan', [AccountController::class, 'createArtisan'])->name('account.createArtisan');
Route::put('/compte/update-artisan', [AccountController::class, 'updateArtisan'])->name('account.updateArtisan');
Route::put('/compte/update-client', [AccountController::class, 'updateClient'])->name('account.updateClient');
Route::put('/compte/update-password', [AccountController::class, 'updatepassword'])->name('account.updatePassword');
Route::post('/update-profile-pic',[AccountController::class,'updateProfilePic'])->name('account.updateProfilePic');     
Route::get('/compte/profil', [AccountController::class, 'profile'])->name('account.profile');
Route::get('/artisan/detail/{id}',[ArtisanController::class,'details'])->name('artisan.details');
Route::post('/demande-devis',[ClientController::class,'demandeDevis'])->name('demande.devis');
Route::get('/qui-sommes-nous',[HomeController::class,'quiSommesNous'])->name('quisommesnous');

// Route::get('/', [HomeController::class, 'index']);


Route::group(['prefix' => 'admin','middleware' => 'checkRole'], function(){
    Route::get('/artisans',[ArtisanController::class,'index'])->name('admin.artisans');
    Route::delete('/artisans',[ArtisanController::class,'destroy'])->name('admin.destroyArtisan');
    Route::get('/clients',[ClientController::class,'index'])->name('admin.clients');
    Route::get('/metiers',[MetierController::class,'index'])->name('admin.metiers');
    Route::post('/metiers',[MetierController::class,'create'])->name('admin.createMetiers');
    Route::put('/metiers',[MetierController::class,'edit'])->name('admin.editMetiers');
    Route::delete('/metiers',[MetierController::class,'destroy'])->name('admin.destroyMetiers');
    Route::get('/publicite',[PubliciteController::class,'index'])->name('admin.publicites');
    
});

Route::group(['prefix' => 'client'], function(){
    Route::get('/artisans',[ClientController::class,'artisans'])->name('client.artisans');
    Route::get('/compte',[ClientController::class,'compte'])->name('client.compte');
    
});

Route::group(['prefix' => 'artisan'], function(){
    Route::get('/client',[ArtisanController::class,'clients'])->name('artisan.clients');
    Route::put('/client/message',[ArtisanController::class,'makeMessageAsRead'])->name('artisan.makeMessageAsRead');
    Route::get('/compte',[ArtisanController::class,'compte'])->name('artisan.compte');

});
