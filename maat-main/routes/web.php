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

//--------- RUTAS BRUNO ---------
Route::get('panel_ong', function () {
    return Inertia::render('Bruno/Panel_ong');
})->middleware(['auth', 'verified'])->name('Panel_ong');

Route::get('panel_company', function () {
    return Inertia::render('Bruno/Panel_company');
})->middleware(['auth', 'verified'])->name('Panel_company');

Route::get('panel_user', function () {
    return Inertia::render('Bruno/Panel_user');
})->middleware(['auth', 'verified'])->name('Panel_user');

Route::get('panel_maat', function () {
    return Inertia::render('Bruno/maat/panel_maat');
})->middleware(['auth', 'verified'])->name('Panel_maat');

Route::get('show', function () {
    return Inertia::render('Bruno/maat/show');
})->middleware(['auth', 'verified'])->name('show');

Route::get('edit', function () {
    return Inertia::render('Bruno/maat/edit');
})->middleware(['auth', 'verified'])->name('edit');
//-------------------------------



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
