<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
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
    return Inertia::render('public/Index');
})->name('index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/events', function () {
    return Inertia::render('Events');
})->middleware(['auth', 'verified'])->name('events');

//---------------------MANU-----------------

Route::get('/eventsIndex', [EventController::class, 'index'])->middleware(['auth', 'verified'])->name('eventsIndex');
Route::get('/createNewEvent', [EventController::class, 'create'])->middleware(['auth', 'verified'])->name('createNewEvent');
Route::patch('/store', [EventController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::patch('/update', [EventController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
Route::get('/edit/{id}', [EventController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
Route::get('/eliminar/{id}', [EventController::class, 'destroy'])->name('delete');
Route::get('/eventsUser', [EventController::class, 'indexEventUser'])->middleware(['auth', 'verified'])->name('eventsUser');
Route::get('/allEventsUser', [EventController::class, 'indexAllEventUser'])->middleware(['auth', 'verified'])->name('allEventsToUser');
Route::get('/eventsUser', [EventController::class, 'indexOwnUserEvents'])->middleware(['auth', 'verified'])->name('ownEventsUser');
Route::get('/add_event_to_user/{id}', [EventController::class, 'apuntarseEvento'])->middleware(['auth', 'verified'])->name('add_event_to_user');
Route::get('/delete_event_of_user/{id}', [EventController::class, 'desapuntarseEvento'])->middleware(['auth', 'verified'])->name('delete_event_of_user');
Route::get('/eventInfo', [EventController::class, 'eventInfo'])->middleware(['auth', 'verified'])->name('eventInfo');


// Route::get('/createEvent', function () {
//     return Inertia::render('private/Manu/CreateEvents');
// })->middleware(['auth', 'verified'])->name('create-event');

Route::get('/plans', function () {
    return Inertia::render('private/Manu/Plans');
})->middleware(['auth', 'verified'])->name('plans');

// Route::get('/eventUser', function () {
//     return Inertia::render('private/Manu/EventUser');
// })->middleware(['auth', 'verified'])->name('event-user');

// Route::get('/eventInfo', function () {
//     return Inertia::render('private/Manu/EventInfo');
// })->middleware(['auth', 'verified'])->name('event-info');
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
