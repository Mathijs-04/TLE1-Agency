<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\MatchsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllVacancyController;

//Route::get('/vacatures', [AllVacancyController::class, 'index'])->name('vacancies.index');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/uitnodigen', function () {
        return view('invite');
    })->name('invite');
});

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

Route::resource('vacatures', AllVacancyController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test-email', function () {
    Mail::raw('Dit is een testmail', function ($message) {
        $message->to('1073412@hr.nl')->subject('Test Email');
    });
    return 'Testmail verzonden!';
});


Route::post('/vacancies/{vacancy}/invite/{user}', [VacancyController::class, 'inviteUserToJob'])->name('vacancies.invite');
Route::get('/emails/invitation/accept/{match}', [InvitationController::class, 'accept'])->name('invitation.accept');
Route::get('/emails/invitation/decline/{match}', [InvitationController::class, 'decline'])->name('invitation.decline');

Route::post('/vacancies/{vacancy}/invite', [VacancyController::class, 'inviteUserToJob'])->name('vacancies.invite');
Route::middleware('auth')->group(function () {
    Route::post('/vacancies/{vacancy}/invite/{user}', [VacancyController::class, 'inviteUserToJob'])->name('vacancies.invite');
    Route::get('/emails/invitation/accept/{match}', [InvitationController::class, 'accept'])->name('invitation.accept');
    Route::get('/emails/invitation/decline/{match}', [InvitationController::class, 'decline'])->name('invitation.decline');
});


//EMAIL API
Route::post('/invite/test-email', [InvitationController::class, 'sendTestEmail'])->name('invite.testEmail');
Route::get('/uitnodigen/{vacancyId}', [InvitationController::class, 'showInviteForm'])->name('invite.form');



require __DIR__ . '/auth.php';

Route::middleware('auth')->prefix('company')->name('company.')->group(function () {
    Route::get('index', [CompanyController::class, 'index'])->name('index');
    Route::get('create', [CompanyController::class, 'create'])->name('create');
    Route::post('store', [CompanyController::class, 'store'])->name('store');
});

Route::get('/company/edit', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/company/update', [CompanyController::class, 'update'])->name('company.update');

