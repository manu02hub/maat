<?php

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

Route::get('/events', function () {
    return Inertia::render('Events');
})->middleware(['auth', 'verified'])->name('events');

Route::get('/eventsIndex', function () {
    return Inertia::render('Manu/Events');
})->middleware(['auth', 'verified'])->name('eventsIndex');

Route::get('/editEvent', function () {
    return Inertia::render('Manu/EditEvents');
})->middleware(['auth', 'verified'])->name('edit-event');

Route::get('/createEvent', function () {
    return Inertia::render('Manu/CreateEvents');
})->middleware(['auth', 'verified'])->name('create-event');

Route::get('/plans', function () {
    return Inertia::render('Manu/Plans');
})->middleware(['auth', 'verified'])->name('plans');

Route::get('/eventUser', function () {
    return Inertia::render('Manu/EventUser');
})->middleware(['auth', 'verified'])->name('event-user');

Route::get('/eventInfo', function () {
    return Inertia::render('Manu/EventInfo');
})->middleware(['auth', 'verified'])->name('event-info');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
