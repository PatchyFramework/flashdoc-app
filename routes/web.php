<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\FlashpharmacyController;
use App\Http\Controllers\JanjiController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CetakResiController;
use App\Http\Controllers\DokterFlashpharmacyController;
use App\Http\Controllers\DokterJanjiController;
use App\Http\Controllers\UserFlashpharmacyController;
use App\Http\Controllers\UserJanjiController;

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
    return view('user.homepage');
});

Route::get('/layout', function () {
    return view('components.layout');
});



Route::group(['prefix' => 'auth'], function () {
    // Route untuk halaman login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('loginpost');


    // Route untuk halaman register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('registerpost');

    // Route untuk Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});



Route::group(['prefix' => 'admin'], function () {
    //Route untuk Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('role:admin');


    //Route untuk Janji Dokter Admin
    Route::get('/janjidokter', [JanjiController::class, 'index'])->name('admin.janji.index')->middleware('role:admin');
    Route::post('/janjidokter', [JanjiController::class, 'create'])->name('admin.janji.create')->middleware('role:admin');
    Route::put('/janjidokter/{id}', [JanjiController::class, 'edit'])->name('admin.janji.edit')->middleware('role:admin');
    Route::delete('/janjidokter/{id}', [JanjiController::class, 'delete'])->name('admin.janji.delete')->middleware('role:admin');

    //Route untuk Flashpharmacy Admin
    Route::get('/flashpharmacy', [FlashpharmacyController::class, 'index'])->name('admin.flashpharmacy.index')->middleware('role:admin');
    Route::post('/flashpharmacy', [FlashpharmacyController::class, 'create'])->name('admin.flashpharmacy.create')->middleware('role:admin');
    Route::get('/flashpharmacy/{id}', [FlashpharmacyController::class, 'show'])->name('admin.flashpharmacy.show')->middleware('role:admin');
    Route::put('/flashpharmacy/{id}', [FlashpharmacyController::class, 'edit'])->name('admin.flashpharmacy.edit')->middleware('role:admin');
    Route::put('/flashpharmacy/{id}', [FlashpharmacyController::class, 'editstatus'])->name('admin.flashpharmacy.editstatus')->middleware('role:admin');
    Route::delete('/flashpharmacy/{id}', [FlashpharmacyController::class, 'delete'])->name('admin.flashpharmacy.delete')->middleware('role:admin');
    Route::get('/flashpharmacy/cetakresi/{id}', [CetakResiController::class, 'preview'])->name('admin.flashpharmacy.cetakresi')->middleware('role:admin');


    //Route untuk Faskes Admin
    Route::get('/faskes', [FaskesController::class, 'index'])->name('admin.faskes.index')->middleware('role:admin');
    Route::post('/faskes', [FaskesController::class, 'create'])->name('admin.faskes.create')->middleware('role:admin');
    Route::put('/faskes/{id}', [FaskesController::class, 'edit'])->name('admin.faskes.edit')->middleware('role:admin');
    Route::delete('/faskes/{id}', [FaskesController::class, 'delete'])->name('admin.faskes.delete')->middleware('role:admin');


});



Route::group(['prefix' => 'dokter'], function () {
    //Route untuk Dashboard Dokter
    Route::get('/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard')->middleware('auth:dokter');


        //Route untuk Janji Dokter Dokter
        Route::get('/janjidokter', [DokterJanjiController::class, 'index'])->name('dokter.janji.index')->middleware('auth:dokter');
        Route::post('/janjidokter', [DokterJanjiController::class, 'create'])->name('dokter.janji.create')->middleware('auth:dokter');
        Route::get('/janjidokter/{id}', [DokterJanjiController::class, 'show'])->name('dokter.janji.show')->middleware('auth:dokter');
        Route::delete('/janjidokter/{id}', [DokterJanjiController::class, 'delete'])->name('dokter.janji.delete')->middleware('auth:dokter');
        Route::put('/janjidokter/{id}/setuju', [DokterJanjiController::class, 'editsetuju'])->name('dokter.janji.editsetuju')->middleware('auth:dokter');
        Route::put('/janjidokter/{id}/batal', [DokterJanjiController::class, 'editbatal'])->name('dokter.janji.editbatal')->middleware('auth:dokter');        
    
        //Route untuk Flashpharmacy Dokter
        Route::get('/flashpharmacy', [DokterFlashpharmacyController::class, 'index'])->name('dokter.flashpharmacy.index')->middleware('auth:dokter');
        Route::post('/flashpharmacy', [DokterFlashpharmacyController::class, 'create'])->name('dokter.flashpharmacy.create')->middleware('auth:dokter');
        Route::put('/flashpharmacy/{id}', [DokterFlashpharmacyController::class, 'edit'])->name('dokter.flashpharmacy.edit')->middleware('auth:dokter');
        Route::delete('/flashpharmacy/{id}', [DokterFlashpharmacyController::class, 'delete'])->name('dokter.flashpharmacy.delete')->middleware('auth:dokter');
});


Route::get('/homepage', [UserController::class, 'index'])->name('user.homepage');

//Janji Dokter User
Route::get('/janjidokter', [UserJanjiController::class, 'index'])->name('user.janji')->middleware('role:user');
Route::post('/janjidokter', [UserJanjiController::class, 'create'])->name('user.janji.create')->middleware('role:user');

//Flashpharmacy User
Route::get('/flashpharmacy', [UserFlashpharmacyController::class, 'index'])->name('user.flashpharmacy')->middleware('role:user');
Route::post('/flashpharmacy', [UserFlashpharmacyController::class, 'create'])->name('user.flashpharmacy.create')->middleware('role:user');
