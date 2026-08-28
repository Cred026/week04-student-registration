<?php

use App\Http\Controllers\StudentController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index'])->name('home');

Route::resource('students', StudentController::class)
    ->only(['index', 'create', 'store', 'show']);

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });

require __DIR__.'/settings.php';
