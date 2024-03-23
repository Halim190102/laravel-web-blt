<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\SubkriteriaController;

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


Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');


    Route::resource('bantuans', BantuanController::class);
    Route::resource('penduduks', PendudukController::class);
    Route::resource('kriterias', KriteriaController::class);
    Route::get('pekerjaan/edit/{pekerjaan}', [KriteriaController::class, 'editpekerjaan']);
    Route::put('pekerjaan/update/{pekerjaan}', [KriteriaController::class, 'updatepekerjaan']);
    Route::get('kepemilikanrumah/edit/{kepemilikanrumah}', [KriteriaController::class, 'editkepemilikanrumah']);
    Route::put('kepemilikanrumah/update/{kepemilikanrumah}', [KriteriaController::class, 'updatekepemilikanrumah']);
    Route::get('bahanbakar/edit/{bahanbakar}', [KriteriaController::class, 'editbahanbakar']);
    Route::put('bahanbakar/update/{bahanbakar}', [KriteriaController::class, 'updatebahanbakar']);
    Route::get('teganganlistrik/edit/{teganganlistrik}', [KriteriaController::class, 'editteganganlistrik']);
    Route::put('teganganlistrik/update/{teganganlistrik}', [KriteriaController::class, 'updateteganganlistrik']);
    Route::get('jenisbangunan/edit/{jenisbangunan}', [KriteriaController::class, 'editjenisbangunan']);
    Route::put('jenisbangunan/update/{jenisbangunan}', [KriteriaController::class, 'updatejenisbangunan']);
    Route::get('jumlahtanggungan/edit/{jumlahtanggungan}', [KriteriaController::class, 'editjumlahtanggungan']);
    Route::put('jumlahtanggungan/update/{jumlahtanggungan}', [KriteriaController::class, 'updatejumlahtanggungan']);
    Route::get('penyakittahunan/edit/{penyakittahunan}', [KriteriaController::class, 'editpenyakittahunan']);
    Route::put('penyakittahunan/update/{penyakittahunan}', [KriteriaController::class, 'updatepenyakittahunan']);
    Route::get('penyakittahunan/edit/{penyakittahunan}', [KriteriaController::class, 'editpenyakittahunan']);
    Route::put('penyakittahunan/update/{penyakittahunan}', [KriteriaController::class, 'updatepenyakittahunan']);
    Route::get('pendapatanbulanan/edit/{pendapatanbulanan}', [KriteriaController::class, 'editpendapatanbulanan']);
    Route::put('pendapatanbulanan/update/{pendapatanbulanan}', [KriteriaController::class, 'updatependapatanbulanan']);
    Route::get('pengeluaranbulanan/edit/{pengeluaranbulanan}', [KriteriaController::class, 'editpengeluaranbulanan']);
    Route::put('pengeluaranbulanan/update/{pengeluaranbulanan}', [KriteriaController::class, 'updatepengeluaranbulanan']);
});
