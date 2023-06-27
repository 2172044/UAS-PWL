<?php

use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\Mk_TawarController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DkbsController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('roles', RoleController::class);
    Route::resource('matkuls', MatkulController::class);
    Route::get('/schedules/{kode_matkul}', [Mk_TawarController::class, 'create'])->name('schedules.create');
    Route::post('/schedules/store', [Mk_TawarController::class, 'store'])->name('schedules.store');
    // Route::resource('schedules', Mk_TawarController::class);
    Route::get('/dkbs', [DkbsController::class, 'index'])->name('dkbs.index');
    Route::get('/dkbs/create', [DkbsController::class, 'create'])->name('dkbs.create');
    Route::post('/dkbs/store', [DkbsController::class, 'store'])->name('dkbs.store');
    // Route::resource('dkbs', DkbsController::class);
    Route::resource('prodis', ProgramStudiController::class);
});

require __DIR__.'/auth.php';
