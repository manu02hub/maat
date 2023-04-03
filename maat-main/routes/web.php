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
<<<<<<< HEAD
Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return Inertia::render('public/Index');
})->name('index');
=======

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
>>>>>>> 6d99990ebfdb12bc38a99cc93a13f68ed23d634b

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/events', function () {
    return Inertia::render('Events');
})->middleware(['auth', 'verified'])->name('events');

<<<<<<< HEAD
//---------------------MANU-----------------
Route::get('/eventsIndex', function () {
    return Inertia::render('private/Manu/Events');
})->middleware(['auth', 'verified'])->name('eventsIndex');

Route::get('/editEvent', function () {
    return Inertia::render('private/Manu/EditEvents');
})->middleware(['auth', 'verified'])->name('edit-event');

Route::get('/createEvent', function () {
    return Inertia::render('private/Manu/CreateEvents');
})->middleware(['auth', 'verified'])->name('create-event');

Route::get('/plans', function () {
    return Inertia::render('private/Manu/Plans');
})->middleware(['auth', 'verified'])->name('plans');

Route::get('/eventUser', function () {
    return Inertia::render('private/Manu/EventUser');
})->middleware(['auth', 'verified'])->name('event-user');

Route::get('/eventInfo', function () {
    return Inertia::render('private/Manu/EventInfo');
})->middleware(['auth', 'verified'])->name('event-info');
//--------------------------------------
//-----------------------------------SERGIO---------------------------------------------------
/*---------------------------------------[Empresa]---------------------------------------*/
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'Empresa'], function () {
    Route::get('/listado', function () {
        return Inertia::render('private/Sergio/UsuariosEmpresa/Listado');
    })->name('listUserEmpresa');

    Route::get('/info', function () {
        return Inertia::render('private/Sergio/UsuariosEmpresa/InfoUsuario');
    })->name('infoUserEmpresa');

    Route::get('/edit', function () {
        return Inertia::render('private/Sergio/UsuariosEmpresa/EditUsuario');
    })->name('editUserEmpresa');
});
/*---------------------------------------------------------------------------------------------------------*/

/*---------------------------------------[ONG]---------------------------------------*/
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'ONG'], function () {
    Route::get('/listado', function () {
        return Inertia::render('private/Sergio/UsuariosONG/Listado');
    })->name('listUserONG');

    Route::get('/info', function () {
        return Inertia::render('private/Sergio/UsuariosONG/InfoUsuario');
    })->name('infoUserONG');

    Route::get('/edit', function () {
        return Inertia::render('private/Sergio/UsuariosONG/EditUsuario');
    })->name('editUserONG');
});
/*---------------------------------------------------------------------------------------------------------*/


//---------------------ALEX-----------------
Route::get('/listado', function () {
    return Inertia::render('private/Alex/ListadoCliente');
})->name('listado');

Route::get('/perfilP', function () {
    return Inertia::render('private/Alex/PerfilPublic');
})->name('perfilP');

Route::get('/chat', function () {
    return Inertia::render('private/Alex/Chat');
})->name('chat');
//------------------------------------------

//---------------------MARIO Y PAULA-----------------
Route::get('/ranking', function () {
    return Inertia::render('public/Ranking');
})->name('ranking');

Route::get('/noticias', function () {
    return Inertia::render('public/Noticias');
})->name('noticias');

Route::get('/item1noticia', function () {
    return Inertia::render('public/Item1');
})->name('item1noticia');

Route::get('/donativos', function () {
    return Inertia::render('public/Donativos');
})->name('donativos');


//---------------------PIERO-----------------
Route::get('/perfil', function () {
    return Inertia::render('private/Piero/PerfilUsuario');
})->middleware(['auth', 'verified'])->name('perfil-usuario');

Route::get('/editar', function () {
    return Inertia::render('private/Piero/EditarUsuario');
})->middleware(['auth', 'verified'])->name('editar-usuario');
//------------------------------------------


//---------------------CARLOS-----------------
Route::get('/perfilempresa', function () {
    return Inertia::render('private/Carlos/PerfilEmpresa');
})->middleware(['auth', 'verified'])->name('perfil-empresa');

Route::get('/editempresa', function () {
    return Inertia::render('private/Carlos/EditEmpresa');
})->middleware(['auth', 'verified'])->name('edit-empresa');
//------------------------------------------


//---------------------JORGE-----------------
Route::get('feed/index', function () {
    return Inertia::render('private/Jorge/Index');
})->middleware(['auth', 'verified'])->name('feed');
Route::get('feed/post', function () {
    return Inertia::render('private/Jorge/Post');
})->middleware(['auth', 'verified'])->name('post');
//------------------------------------------

=======
>>>>>>> 6d99990ebfdb12bc38a99cc93a13f68ed23d634b
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
