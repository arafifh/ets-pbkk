<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekamMedisController;

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

Route::get('/form', [RekamMedisController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::post('/create', [RekamMedisController::class, 'create']);
    Route::get('/data', [RekamMedisController::class, 'show'])->name('data');
    Route::get('/search-pasien', [RekamMedisController::class, 'searchPasien'])->name('search-pasien');
    Route::get('/search-dokter', [RekamMedisController::class, 'searchDokter'])->name('search-dokter');
});

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
});

require __DIR__.'/auth.php';
