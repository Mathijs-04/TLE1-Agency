<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\MatchsController;
use Illuminate\Support\Facades\Route;

//Route::get('/vacatures', function () {
//    return view('vacatures');
//});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/uitnodigen', function () {
    return view('invite');
})->name('invite');

Route::get('/bevestiging', function () {
    return view('bevestiging');
})->name('bevestiging');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/info-werkgever', function () {
    return view('info-werkgever');
})->name('info-werkgever');

Route::get('/vacatures', [VacancyController::class, 'showAllVacancy'])->name('vacatures.index');



Route::resource('my-vacancies', VacancyController::class);

Route::middleware('auth')->group(function () {
    Route::resource('mijn-vacatures', VacancyController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test-email', function () {
    Mail::raw('Dit is een testmail', function ($message) {
        $message->to('cwcpokemon@gmail.com')->subject('Test Email');
    });
    return 'Testmail verzonden!';
});


Route::post('/vacancies/{vacancy}/invite/{user}', [VacancyController::class, 'inviteUserToJob'])->name('vacancies.invite');
Route::get('/emails/invitation/accept/{match}', [InvitationController::class, 'accept'])->name('invitation.accept');
Route::get('/emails/invitation/decline/{match}', [InvitationController::class, 'decline'])->name('invitation.decline');


require __DIR__ . '/auth.php';

