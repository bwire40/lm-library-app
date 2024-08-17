<?php

use App\Http\Controllers\AcquisitionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\FeeModuleController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReturnBookController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Models\ReturnBook;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get("/", [HomeController::class, "index"])->middleware(['auth', 'verified', Admin::class])->name("dashboard");

// catalogue route
Route::resource('/books', BookController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified', Admin::class]);

// Acquisition routes
Route::resource('/acquisition', AcquisitionController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified', Admin::class]);


// return book routes
Route::resource('/return', ReturnBookController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified', Admin::class]);

// users route
Route::resource('/users', UserController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified', Admin::class]);


Route::resource('/guests', GuestController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified', Admin::class]);


Route::resource('/genre', GenreController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified', Admin::class]);

// download route
Route::get('/downloadpdf', [ReturnBookController::class, 'generatePDF'])->name('downloadpdf');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';