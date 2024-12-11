<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/vacatures', function () {
    return view('vacatures');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/bevestiging', function () {
    return view('bevestiging');
})->name('bevestiging');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/info-werkgever', function () {
    return view('info-werkgever');
})->name('info-werkgever');

Route::middleware('auth')->group(function () {
    Route::resource('mijn-vacatures', VacancyController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->prefix('company')->name('company.')->group(function () {
    Route::get('index', [CompanyController::class, 'index'])->name('index');
    Route::get('create', [CompanyController::class, 'create'])->name('create');
    Route::post('store', [CompanyController::class, 'store'])->name('store');
});

Route::get('/company/edit', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/company/update', [CompanyController::class, 'update'])->name('company.update');

