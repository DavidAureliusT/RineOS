<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('crews', CrewController::class)
    ->only(['index', 'create', 'store', 'show', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::post('crews/{crew}/photo_profile', [CrewController::class, 'upload_photo_profile'])
    ->name('crews.upload_photo_profile')
    ->middleware(['auth', 'verified']);

Route::resource('contracts', ContractController::class)
    ->only(['index', 'create', 'store', 'show', 'update'])
    ->middleware(['auth', 'verified']);

Route::controller(DocumentController::class)->group( function () {
    Route::post('crews/{crew}/documents', 'store')->name('documents.store');
    Route::put('documents/{document}', 'update')->name('documents.update');
    Route::delete('documents/{document}', 'destroy')->name('documents.destroy');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
