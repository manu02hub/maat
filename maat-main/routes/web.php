<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileEmprController;
use App\Http\Controllers\ListadoController;
use App\Http\Controllers\Auth\RegisteredUserController;


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
    // Route::get('/listado', function () {
    //     return Inertia::render('private/Sergio/UsuariosEmpresa/Listado');
    // })->name('listUserEmpresa');

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
Route::get('/chat/{id}', [ListadoController::class, 'getIdReceptor'])->middleware(
    ['auth', 'verified']
)->name('getIdChatWith');
Route::post('/chat/getBy', [ListadoController::class, 'getChatById'])->middleware(
    ['auth', 'verified']
)->name('chatById');
Route::post('/chat/send', [ListadoController::class, 'sendChat'])->middleware(
    ['auth', 'verified']
)->name('chat.send');

// Listado de ONGs
Route::get('/get/listado', [ListadoController::class, 'getListado'])->middleware(['auth', 'verified']);
Route::get('/get/listado/reciente', [ListadoController::class, 'getListadoOngRecientes'])->middleware(
    ['auth', 'verified']
);

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

Route::get('/noticias', function () {
    return Inertia::render('public/Noticias');
})->name('noticias');

Route::get('/item1noticia', function () {
    return Inertia::render('public/Item1');
})->name('item1noticia');

Route::get('/donativos', function () {
    return Inertia::render('public/Donativos');
})->name('donativos');


//---------------------MARIO-----------------

// Route::post('/form', FormController::class)->name('contact');
// Route::get('/correo', EmployeeController::class, )->name('correo');

Route::get('/indexUser', [RegisteredUserController::class, 'indexUser'])->middleware(['auth', 'verified'])->name('indexUser');
Route::patch('/createUser', [RegisteredUserController::class, 'createUser'])->middleware(['auth', 'verified'])->name('createUser');
Route::get('/editUser/{id}', [RegisteredUserController::class, 'editUser'])->middleware(['auth', 'verified'])->name('editUser');
Route::patch('/update', [RegisteredUserController::class, 'updateUser'])->middleware(['auth', 'verified'])->name('updateUser');
Route::get('/eliminar/{id}', [RegisteredUserController::class, 'destroyUser'])->name('deleteUser');


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
