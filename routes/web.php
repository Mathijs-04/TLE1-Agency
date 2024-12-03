<?php

use App\Http\Controllers\vacansyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('my-vacancies', VacansyController::class);
