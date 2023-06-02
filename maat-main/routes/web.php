<?php

use App\Http\Controllers\EventController;
use Illuminate\Foundation\Application;
use App\Http\Controllers\RankingController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisterUser;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Private\AsocicacionesContratadasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileEmprController;
use App\Http\Controllers\ListadoController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\OrganizacionesController;
use App\Http\Controllers\Private\MigrationsController;
use App\Http\Controllers\Private\RolController;
use App\Http\Controllers\Private\ValoracionesController;
use App\Http\Controllers\Private\PasswordResetsController;
use App\Http\Controllers\Private\TiposPlanController;
use App\Http\Controllers\Private\TransaccionController;
use App\Http\Controllers\Private\PersonalAccessTokensController;
use App\Http\Controllers\Private\UserHasEventoController;
use App\Mail\EmployeeForm;
use Illuminate\Support\Facades\Mail;

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



/*----------------------------------------------------[SERGIO]----------------------------------------------------*/

Route::get('/eventsIndex', [EventController::class, 'index'])->middleware(['auth', 'verified','CheckUserRole:1'])->name('eventsIndex');
Route::get('/createNewEvent', [EventController::class, 'create'])->middleware(['auth', 'verified','CheckUserRole:1'])->name('createNewEvent');
Route::patch('/store', [EventController::class, 'store'])->middleware(['auth', 'verified','CheckUserRole:1'])->name('store');
Route::patch('/updateEvent', [EventController::class, 'update'])->middleware(['auth', 'verified','CheckUserRole:1'])->name('updateEvent');
Route::get('/edit/{id}', [EventController::class, 'edit'])->middleware(['auth', 'verified','CheckUserRole:1'])->name('edit');
Route::get('/eliminar/{id}', [EventController::class, 'destroy'])->middleware(['auth', 'verified','CheckUserRole:1'])->name('delete');
Route::get('/allEventsUser', [EventController::class, 'indexAllEventUser'])->middleware(['auth', 'verified'])->name('allEventsToUser');
Route::get('/eventsUser', [EventController::class, 'indexOwnUserEvents'])->middleware(['auth', 'verified'])->name('ownEventsUser');
Route::get('/add_event_to_user/{id}', [EventController::class, 'apuntarseEvento'])->middleware(['auth', 'verified'])->name('add_event_to_user');
Route::get('/delete_event_of_user/{id}', [EventController::class, 'desapuntarseEvento'])->middleware(['auth', 'verified'])->name('delete_event_of_user');
Route::get('/eventInfo/{id}', [EventController::class, 'eventInfo'])->middleware(['auth', 'verified'])->name('eventInfo');
Route::get('/plans', [PlansController::class, 'index'])->middleware(['auth', 'verified'])->name('plans');
Route::get('/joinPlan/{id}', [PlansController::class, 'joinPlan'])->middleware(['auth', 'verified'])->name('joinPlan');
Route::get('/deposePlan/{id}', [PlansController::class, 'deposePlan'])->middleware(['auth', 'verified'])->name('deposePlan');


Route::get('/match/{id}', [MatchController::class, 'match'])->middleware(['auth', 'verified'])->name('match');



// Route::get('/eventsUser', [EventController::class, 'indexEventUser'])->middleware(['auth', 'verified])->name('eventsUser');
// Route::get('/deposePlan/{id}',[PlansController::class, 'deposePlan'])->middleware(['auth', 'verified'])->name('deposePlan');

/*----------------------------------------------------------------------------------------------------------------*/
//------------------------------------MARIO---------------------------------------------------

//PUBLIC
Route::get('/indexUserONG', [RegisterUser::class, 'indexUserONG'])->middleware(['auth', 'verified'])->name('indexUserONG');
Route::get('/indexUserEmpresa', [RegisterUser::class, 'indexUserEmpresa'])->middleware(['auth', 'verified'])->name('indexUserEmpresa');
Route::get('/newUserONG', [RegisterUser::class, 'newUserONG'])->middleware(['auth', 'verified'])->name('newUserONG');
Route::get('/newUserEmpresa', [RegisterUser::class, 'newUserEmpresa'])->middleware(['auth', 'verified'])->name('newUserEmpresa');
Route::patch('/createUserONG', [RegisterUser::class, 'createUserONG'])->middleware(['auth', 'verified'])->name('createUserONG');
Route::patch('/createUserEmpresa', [RegisterUser::class, 'createUserEmpresa'])->middleware(['auth', 'verified'])->name('createUserEmpresa');
Route::get('/editUserONG/{id}', [RegisterUser::class, 'editUserONG'])->middleware(['auth', 'verified'])->name('editUserONG');
Route::get('/editUserEmpresa/{id}', [RegisterUser::class, 'editUserEmpresa'])->middleware(['auth', 'verified'])->name('editUserEmpresa');
Route::patch('/updateUserEmpresa', [RegisterUser::class, 'updateUserEmpresa'])->middleware(['auth', 'verified'])->name('updateUserEmpresa');
Route::patch('/updateUserONG', [RegisterUser::class, 'updateUserONG'])->middleware(['auth', 'verified'])->name('updateUserONG');
Route::get('/eliminarUser/{id}', [RegisterUser::class, 'destroyUser'])->middleware(['auth', 'verified'])->name('deleteUser');
Route::patch('/updateUser', [RegisterUser::class, 'updateUser'])->middleware(['auth', 'verified'])->name('updateUser');
Route::get('/recogerRanking', [RankingController::class, 'ranking'])->name('recogerRanking');

Route::get('/editUser/{id}', [RegisterUser::class, 'editUser'])->middleware(['auth', 'verified'])->name('editUser');
Route::get('/recogerPerfil',[PerfilController::class, 'indexPerfil'])->name('recogerPerfil');

    //PERFIL
Route::get('recogerPerfil',[PerfilController::class, 'indexPerfil'])->name('recogerPerfil');

    //POST
Route::get('recogerPost',[PostController::class, 'indexPost'])->name('recogerPost');

    //COMENTARIO
Route::patch('crearComentario/{id}', [PostController::class, 'createComentario'])->name('crearComentario');
Route::get('/deleteComentario/{id}', [PostController::class, 'destroyComentario'])->name('deleteComentario');

    //LIKES
Route::get('/añadirLike/{id}', [PostController::class, 'addLike'])->name('añadirLike');



    //MAIL
Route::get('employeeForm/{mail}',function($mail){
    // dd($mail);
    $correo = new EmployeeForm;
    // dd($correo);
    Mail::to($mail)->send($correo);
})->name('employeeForm');


//PRIVATE MAAT
//AsocicacionesContratadas
Route::get('indexAsocicacionesContratadas',[AsocicacionesContratadasController::class, 'index'])->name('indexAsocicacionesContratadas');
Route::get('createAsocicacionesContratadas', [AsocicacionesContratadasController::class, 'create'])->name('createAsocicacionesContratadas');
Route::patch('storeAsocicacionesContratadas', [AsocicacionesContratadasController::class, 'store'])->name('storeAsocicacionesContratadas');
Route::get('editAsocicacionesContratadas/{id}', [AsocicacionesContratadasController::class, 'edit'])->name('editAsocicacionesContratadas');
Route::patch('updateAsocicacionesContratadas', [AsocicacionesContratadasController::class, 'update'])->name('updateAsocicacionesContratadas');
Route::get('deleteAsocicacionesContratadas/{id}', [AsocicacionesContratadasController::class, 'destroyAsocicacionesContratadas'])->name('deleteAsocicacionesContratadas');


//Migrations
Route::get('indexMigrations',[MigrationsController::class, 'index'])->name('indexMigrations');
Route::get('createMigrations', [MigrationsController::class, 'create'])->name('createMigrations');
Route::patch('storeMigrations', [MigrationsController::class, 'store'])->name('storeMigrations');
Route::get('editMigrations/{id}', [MigrationsController::class, 'edit'])->name('editMigrations');
Route::post('updateMigrations/{id}', [MigrationsController::class, 'update'])->name('updateMigrations');
Route::get('deleteMigrations/{id}', [MigrationsController::class, 'destroy'])->name('deleteMigrations');


//Rol
Route::get('indexRol',[RolController::class, 'index'])->name('indexRol');
Route::get('createRol', [RolController::class, 'create'])->name('createRol');
Route::patch('storeRol', [RolController::class, 'store'])->name('storeRol');
Route::get('editRol/{id}', [RolController::class, 'edit'])->name('editRol');
Route::post('updateRol/{id}', [RolController::class, 'update'])->name('updateRol');
Route::get('deleteRol/{id}', [RolController::class, 'destroy'])->name('deleteRol');

//Valoracion
Route::get('indexValoracion',[ValoracionesController::class, 'index'])->name('indexValoracion');
Route::get('createValoracion', [ValoracionesController::class, 'create'])->name('createValoracion');
Route::patch('storeValoracion', [ValoracionesController::class, 'store'])->name('storeValoracion');
Route::get('editValoracion/{id}', [ValoracionesController::class, 'edit'])->name('editValoracion');
Route::post('updateValoracion/{id}', [ValoracionesController::class, 'update'])->name('updateValoracion');
Route::get('deleteValoracion/{id}', [ValoracionesController::class, 'destroy'])->name('deleteValoracion');

//PasswordReset
Route::get('indexPasswordReset',[PasswordResetsController::class, 'index'])->name('indexPasswordReset');
Route::get('createPasswordReset', [PasswordResetsController::class, 'create'])->name('createPasswordReset');
Route::patch('storePasswordReset', [PasswordResetsController::class, 'store'])->name('storePasswordReset');
Route::get('editPasswordReset/{id}', [PasswordResetsController::class, 'edit'])->name('editPasswordReset');
Route::post('updatePasswordReset/{id}', [PasswordResetsController::class, 'update'])->name('updatePasswordReset');
Route::get('deletePasswordReset/{id}', [PasswordResetsController::class, 'destroy'])->name('deletePasswordReset');

//tiposPlan
Route::get('indexTiposPlan',[TiposPlanController::class, 'index'])->name('indexTiposPlan');
Route::get('createTiposPlan', [TiposPlanController::class, 'create'])->name('createTiposPlan');
Route::patch('storeTiposPlan', [TiposPlanController::class, 'store'])->name('storeTiposPlan');
Route::get('editTiposPlan/{id}', [TiposPlanController::class, 'edit'])->name('editTiposPlan');
Route::post('updateTiposPlan/{id}', [TiposPlanController::class, 'update'])->name('updateTiposPlan');
Route::get('deleteTiposPlan/{id}', [TiposPlanController::class, 'destroy'])->name('deleteTiposPlan');

//Transacciones
Route::get('indexTransacciones',[TransaccionController::class, 'index'])->name('indexTransacciones');
Route::get('createTransacciones', [TransaccionController::class, 'create'])->name('createTransacciones');
Route::patch('storeTransacciones', [TransaccionController::class, 'store'])->name('storeTransacciones');
Route::get('editTransacciones/{id}', [TransaccionController::class, 'edit'])->name('editTransacciones');
Route::post('updateTransacciones/{id}', [TransaccionController::class, 'update'])->name('updateTransacciones');
Route::get('deleteTransacciones/{id}', [TransaccionController::class, 'destroy'])->name('deleteTransacciones');

//personalAccessToken
Route::get('indexpersonalAccessToken',[PersonalAccessTokensController::class, 'index'])->name('indexpersonalAccessToken');
Route::get('createpersonalAccessToken', [PersonalAccessTokensController::class, 'create'])->name('createpersonalAccessToken');
Route::patch('storepersonalAccessToken', [PersonalAccessTokensController::class, 'store'])->name('storepersonalAccessToken');
Route::get('editpersonalAccessToken/{id}', [PersonalAccessTokensController::class, 'edit'])->name('editpersonalAccessToken');
Route::post('updatepersonalAccessToken/{id}', [PersonalAccessTokensController::class, 'update'])->name('updatepersonalAccessToken');
Route::get('deletepersonalAccessToken/{id}', [PersonalAccessTokensController::class, 'destroy'])->name('deletepersonalAccessToken');

//personalAccessToken
Route::get('indexuserHasEvento',[UserHasEventoController::class, 'index'])->name('indexuserHasEvento');
Route::get('createuserHasEvento', [UserHasEventoController::class, 'create'])->name('createuserHasEvento');
Route::patch('storeuserHasEvento', [UserHasEventoController::class, 'store'])->name('storeuserHasEvento');
Route::get('edituserHasEvento/{id}', [UserHasEventoController::class, 'edit'])->name('edituserHasEvento');
Route::post('updateuserHasEvento/{id}', [UserHasEventoController::class, 'update'])->name('updateuserHasEvento');
Route::get('deleteuserHasEvento/{id}', [UserHasEventoController::class, 'destroy'])->name('deleteuserHasEvento');




//--------------------------------------------
/*---------------------------------------[Empresa]---------------------------------------*/
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'Empresa'], function () {
    /*------------------------------------------------------------------------------------------*/
    Route::get('/indexUser', [RegisterUser::class, 'indexUser'])->middleware(['auth', 'verified'])->name('indexUser');
    /*------------------------------------------------------------------------------------------*/

    // Route::get('/listado', function () {
    //     return Inertia::render('private/Sergio/UsuariosEmpresa/Listado');
    // })->name('listUserEmpresa');

    // Route::get('/info', function () {
    //     return Inertia::render('private/Sergio/UsuariosEmpresa/InfoUsuario');
    // })->name('infoUserEmpresa');

    // Route::get('/edit', function () {
    //     return Inertia::render('private/Sergio/UsuariosEmpresa/EditUsuario');
    // })->name('editUserEmpresa');
});
/*---------------------------------------------------------------------------------------------------------*/

/*---------------------------------------[ONG]---------------------------------------*/
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'ONG'], function () {
    // Route::get('/listado', function () {
    //     return Inertia::render('private/Sergio/UsuariosONG/Listado');
    // })->name('listUserONG');

    // Route::get('/info', function () {
    //     return Inertia::render('private/Sergio/UsuariosONG/InfoUsuario');
    // })->name('infoUserONG');

    // Route::get('/edit', function () {
    //     return Inertia::render('private/Sergio/UsuariosONG/EditUsuario');
    // })->name('editUserONG');
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
Route::get('/chat/{id}', [ChatController::class, 'getIdReceptor'])->middleware(
    ['auth', 'verified']
)->name('getIdChatWith');

// Chat coger todo si se ha accedido desde url /chat sin id
Route::post('/chat/all', [ChatController::class, 'getAllChats'])->middleware(
    ['auth', 'verified']
)->name('chatAll');

// Recepcion de los datos iniciales (ejecutados a partir de url chat con id)
Route::post('/chat/getBy', [ChatController::class, 'getChatById'])->middleware(
    ['auth', 'verified']
)->name('chatById');

// Para abrir chat al clickear en una entidad
Route::post('/chat/open', [ChatController::class, 'getChatSelected'])->middleware(
    ['auth', 'verified']
)->name('chat.open');

// Enviar mensajes de chat
Route::post('/chat/send', [ChatController::class, 'sendChat'])->middleware(
    ['auth', 'verified']
)->name('chat.send');

// Recarga los últimos 100 mensajes de chat
Route::post('/chat/refresh', [ChatController::class, 'refreshChatSelected'])->middleware(
    ['auth', 'verified']
)->name('chat.refresh');

// Listado de ONGs
Route::get('/get/listado', [ListadoController::class, 'getListado'])->middleware(['auth', 'verified']);

// CRUD empresa
Route::get('/get/empresa', [ProfileEmprController::class, 'getEmpr'])->middleware(['auth', 'verified']);
Route::post('/edit/empresa', [ProfileEmprController::class, 'editEmpr'])->middleware(['auth', 'verified']);
Route::post('/del/empresa', [ProfileEmprController::class, 'deleteEmpr'])->middleware(
    ['auth', 'verified']
)->name('empr.delete');

//------------------------------------------

//---------------------PAULA-----------------

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
    Route::get('/noticias', [NoticiasController::class, 'index'])->name('noticias');
    Route::get('/noticias-listado', [NoticiasController::class, 'noticiaslistado'])->name('noticias-listado');
    Route::get('/create', [NoticiasController::class, 'create'])->name('noticia-create');
    Route::patch('/store', [NoticiasController::class, 'store'])->name('noticia-store');
    Route::get('/edit/{id}', [NoticiasController::class, 'edit'])->name('noticia-edit');
    Route::post('/update/{id}', [NoticiasController::class, 'update'])->name('noticia-update');
    Route::get('/destroy/{id}', [NoticiasController::class, 'destroy'])->name('noticia-destroy');
});

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
