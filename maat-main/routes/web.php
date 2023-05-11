<?php

use App\Http\Controllers\EventController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisterUser;
<<<<<<< HEAD
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileEmprController;
use App\Http\Controllers\ListadoController;
use App\Http\Controllers\PlansController;
=======
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ProfileEmprController;
use App\Http\Controllers\ListadoController;
use App\Http\Controllers\OrganizacionesController;
>>>>>>> carlos

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
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return Inertia::render('public/Index');
})->name('index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/events', function () {
    return Inertia::render('Events');
})->middleware(['auth', 'verified'])->name('events');

//---------------------MANU-----------------

<<<<<<< HEAD
Route::get('/eventsIndex', [EventController::class, 'index'])->middleware(['auth', 'verified','CheckUserRole:2'])->name('eventsIndex');
Route::get('/createNewEvent', [EventController::class, 'create'])->middleware(['auth', 'verified','CheckUserRole:2'])->name('createNewEvent');
Route::patch('/store', [EventController::class, 'store'])->middleware(['auth', 'verified','CheckUserRole:2'])->name('store');
Route::patch('/updateEvent', [EventController::class, 'update'])->middleware(['auth', 'verified','CheckUserRole:2'])->name('updateEvent');
Route::get('/edit/{id}', [EventController::class, 'edit'])->middleware(['auth', 'verified','CheckUserRole:2'])->name('edit');
Route::get('/eliminar/{id}', [EventController::class, 'destroy'])->middleware(['auth', 'verified','CheckUserRole:2'])->name('delete');
// Route::get('/eventsUser', [EventController::class, 'indexEventUser'])->middleware(['auth', 'verified','CheckUserRole:3'])->name('eventsUser');
Route::get('/allEventsUser', [EventController::class, 'indexAllEventUser'])->middleware(['auth', 'verified','CheckUserRole:1'])->name('allEventsToUser');
Route::get('/eventsUser', [EventController::class, 'indexOwnUserEvents'])->middleware(['auth', 'verified','CheckUserRole:1'])->name('ownEventsUser');
Route::get('/add_event_to_user/{id}', [EventController::class, 'apuntarseEvento'])->middleware(['auth', 'verified','CheckUserRole:1'])->name('add_event_to_user');
Route::get('/delete_event_of_user/{id}', [EventController::class, 'desapuntarseEvento'])->middleware(['auth', 'verified','CheckUserRole:1'])->name('delete_event_of_user');
Route::get('/eventInfo/{id}', [EventController::class, 'eventInfo'])->middleware(['auth', 'verified','CheckUserRole:1'])->name('eventInfo');
Route::get('/plans', [PlansController::class, 'index'])->middleware(['auth', 'verified','CheckUserRole:3'])->name('plans');
Route::get('/joinPlan/{id}',[PlansController::class, 'joinPlan'])->middleware(['auth', 'verified','CheckUserRole:3'])->name('joinPlan');
Route::get('/deposePlan/{id}',[PlansController::class, 'deposePlan'])->middleware(['auth', 'verified','CheckUserRole:3'])->name('deposePlan');

// Route::get('/plans', function () {
//     return Inertia::render('private/Manu/Plans');
// })->middleware(['auth', 'verified'])->name('plans');
=======
Route::get('/eventsIndex', [EventController::class, 'index'])->middleware(['auth', 'verified'])->name('eventsIndex');
Route::get('/createNewEvent', [EventController::class, 'create'])->middleware(['auth', 'verified'])->name('createNewEvent');
Route::patch('/store', [EventController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::patch('/updateEvent', [EventController::class, 'update'])->middleware(['auth', 'verified'])->name('updateEvent');
Route::get('/edit/{id}', [EventController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
Route::get('/eliminar/{id}', [EventController::class, 'destroy'])->middleware(['auth', 'verified'])->name('delete');
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
>>>>>>> carlos

//-----------------------------------SERGIO---------------------------------------------------
//---------------------MARIO-----------------

Route::get('/indexUser', [RegisterUser::class, 'indexUser'])->middleware(['auth', 'verified'])->name('indexUser');
Route::patch('/createUser', [RegisterUser::class, 'createUser'])->middleware(['auth', 'verified'])->name('createUser');
Route::get('/editUser/{id}', [RegisterUser::class, 'editUser'])->middleware(['auth', 'verified'])->name('editUser');
Route::patch('/update', [RegisterUser::class, 'updateUser'])->middleware(['auth', 'verified'])->name('updateUser');
Route::get('/eliminarUser/{id}', [RegisterUser::class, 'destroyUser'])->name('deleteUser');

//--------------------------------------------
/*---------------------------------------[Empresa]---------------------------------------*/
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'Empresa'], function () {

<<<<<<< HEAD
=======


>>>>>>> carlos
    /*------------------------------------------------------------------------------------------*/
    Route::get('/indexUser', [RegisterUser::class, 'indexUser'])->middleware(['auth', 'verified'])->name('indexUser');
    /*------------------------------------------------------------------------------------------*/

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
})->middleware(['auth', 'verified'])->name('listado');

Route::get('/perfilP/{id}', [ListadoController::class, 'getPerfilP'])->middleware(
    ['auth', 'verified']
)->name('perfilP');

// Abre el chat en general
Route::get('/chat', function () {
    return Inertia::render('private/Alex/Chat');
})->middleware(['auth', 'verified'])->name('chat');

// Abre el chat según la id de la entidad con la que se quiera hablar
<<<<<<< HEAD
Route::get('/chat/{id}', [ChatController::class, 'getIdReceptor'])->middleware(
=======
Route::get('/chat/{id}', [ListadoController::class, 'getIdReceptor'])->middleware(
>>>>>>> carlos
    ['auth', 'verified']
)->name('getIdChatWith');

// Chat coger todo si se ha accedido desde url /chat sin id
<<<<<<< HEAD
Route::post('/chat/all', [ChatController::class, 'getAllChats'])->middleware(
=======
Route::post('/chat/all', [ListadoController::class, 'getAllChats'])->middleware(
>>>>>>> carlos
    ['auth', 'verified']
)->name('chatAll');

// Recepcion de los datos iniciales (ejecutados a partir de url chat con id)
<<<<<<< HEAD
Route::post('/chat/getBy', [ChatController::class, 'getChatById'])->middleware(
=======
Route::post('/chat/getBy', [ListadoController::class, 'getChatById'])->middleware(
>>>>>>> carlos
    ['auth', 'verified']
)->name('chatById');

// Para abrir chat al clickear en una entidad
<<<<<<< HEAD
Route::post('/chat/open', [ChatController::class, 'getChatSelected'])->middleware(
=======
Route::post('/chat/open', [ListadoController::class, 'getChatSelected'])->middleware(
>>>>>>> carlos
    ['auth', 'verified']
)->name('chat.open');

// Enviar mensajes de chat
<<<<<<< HEAD
Route::post('/chat/send', [ChatController::class, 'sendChat'])->middleware(
    ['auth', 'verified']
)->name('chat.send');

// Recarga los últimos 100 mensajes de chat
Route::post('/chat/refresh', [ChatController::class, 'refreshChatSelected'])->middleware(
    ['auth', 'verified']
)->name('chat.refresh');
=======
Route::post('/chat/send', [ListadoController::class, 'sendChat'])->name('chat.send');

// Recarga los últimos 100 mensajes de chat
Route::post('/chat/refresh', [ListadoController::class, 'refreshChatSelected'])->name('chat.refresh');
>>>>>>> carlos

// Listado de ONGs
Route::get('/get/listado', [ListadoController::class, 'getListado'])->middleware(['auth', 'verified']);

// CRUD empresa
Route::get('/get/empresa', [ProfileEmprController::class, 'getEmpr'])->middleware(['auth', 'verified']);
Route::post('/edit/empresa', [ProfileEmprController::class, 'editEmpr'])->middleware(['auth', 'verified']);
Route::post('/del/empresa', [ProfileEmprController::class, 'deleteEmpr'])->middleware(
    ['auth', 'verified']
)->name('empr.delete');

//------------------------------------------

//---------------------MARIO Y PAULA-----------------
Route::get('/ranking', function () {
    return Inertia::render('public/Ranking');
})->name('ranking');

<<<<<<< HEAD
Route::get('/noticias', function () {
    return Inertia::render('public/Noticias');
})->name('noticias');
=======
// Route::get('/noticias', function () {
//     return Inertia::render('public/Noticias');
// })->name('noticias');

Route::get('/noticias', [NoticiasController::class, 'index'])->name('noticias');
>>>>>>> carlos

Route::get('/item1noticia', function () {
    return Inertia::render('public/Item1');
})->name('item1noticia');

Route::get('/donativos', function () {
    return Inertia::render('public/Donativos');
})->name('donativos');

<<<<<<< HEAD
// Route::get('/get/listado', [ListadoController::class, 'getListado'])->middleware(['auth', 'verified']);

=======

// Route::get('/get/listado', [ListadoController::class, 'getListado'])->middleware(['auth', 'verified']);


>>>>>>> carlos
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
<<<<<<< HEAD
=======

Route::get('/editorganizacion', function () {
    return Inertia::render('private/Carlos/EditOrganizacion');
})->middleware(['auth', 'verified'])->name('edit-organizacion');

// CRUD ONGs
Route::get('/get/organizacion', [OrganizacionesController::class, 'getONG'])->middleware(['auth', 'verified']);
Route::post('/edit/organizacion', [OrganizacionesController::class, 'editONG'])->middleware(['auth', 'verified']);
Route::post('/del/organizacion', [OrganizacionesController::class, 'deleteONG'])->middleware(
    ['auth', 'verified']
)->name('ong.delete');

//CRUD noticias

Route::prefix('/noticias')->group(function () {

    Route::get('/noticias-listado', [NoticiasController::class, 'noticiaslistado'])->name('noticias-listado');
    Route::get('create', [NoticiasController::class, 'create'])->name('noticia-create');
    Route::patch('/store', [NoticiasController::class, 'store'])->name('noticia-store');
    Route::get('edit/{id}', [NoticiasController::class, 'edit'])->name('noticia-edit');
    Route::post('update/{id}', [NoticiasController::class, 'update'])->name('noticia-update');
    Route::get('destroy/{id}', [NoticiasController::class, 'destroy'])->name('noticia-destroy');
});
>>>>>>> carlos
//------------------------------------------


//---------------------JORGE-----------------
Route::get('feed/index', function () {
    return Inertia::render('private/Jorge/Index');
})->middleware(['auth', 'verified'])->name('feed');
Route::get('feed/post', function () {
    return Inertia::render('private/Jorge/Post');
})->middleware(['auth', 'verified'])->name('post');
//------------------------------------------
Route::get('/perfilempresa', function () {
    return Inertia::render('Carlos/PerfilEmpresa');
})->middleware(['auth', 'verified'])->name('perfil-empresa');

Route::get('/editempresa', function () {
    return Inertia::render('Carlos/EditEmpresa');
})->middleware(['auth', 'verified'])->name('edit-empresa');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
