<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\StatusController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('agencies')->group(function (){
    Route::get('/', [AgencyController::class, 'index'])->name('agencies.list');
    Route::get('/create', [AgencyController::class, 'create'])->name('agencies.create');
    Route::post('/create', [AgencyController::class, 'store'])->name('agencies.store');
    Route::get('/{id}/edit', [AgencyController::class, 'edit'])->name('agencies.edit');
    Route::post('/{id}/edit', [AgencyController::class, 'update'])->name('agencies.update');
    Route::get('/{id}/destroy', [AgencyController::class, 'destroy'])->name('agencies.destroy');
    Route::get('/search', [AgencyController::class, 'search'])->name('agencies.search');
    Route::get('/validation', [AgencyController::class, 'checkValidation'])->name('products.checkValidation');
});
Route::prefix('status')->group(function () {
    Route::get('/', [StatusController::class, 'index'])->name('status.list');
    Route::get('/create', [StatusController::class, 'create'])->name('status.create');
    Route::post('/create', [StatusController::class, 'store'])->name('status.store');
    Route::get('/{id}/edit', [StatusController::class, 'edit'])->name('status.edit');
    Route::post('/{id}/edit', [StatusController::class, 'update'])->name('status.update');
    Route::get('/{id}/destroy', [StatusController::class, 'destroy'])->name('status.destroy');
});
