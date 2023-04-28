<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
<<<<<<< HEAD
use Illuminate\Support\Facades\Redirect; 
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\DB;
=======
use Inertia\Inertia;
use Inertia\Response;
>>>>>>> sergio

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

<<<<<<< HEAD
    public function indexUser(Request $request){
        $user = User::all();
        return Inertia::render('private/Sergio/UsuariosEmpresa/Listado', compact('user'));
    }

    public function createUser(Request $request){
        // dd($request);
        $user = new User();
        $user-> nombre = $request->nombre;
        $user-> email = $request->email;
        $user-> password = $request->password;
        // $user-> password_confirmation = $request->password_confirmation;
        $user-> rol_id= $request->rol;
        $user->entidad_id=1;
        $user->save();
        return Redirect::route('indexUser');
    }

    public function editUser($id){
        $user = User::findOrFail($id);
        // dd($user);
        // return Inertia::render('private/Sergio/UsuariosEmpresa/EditarUsuario', compact('user'));
        return Inertia::render('private/Sergio/UsuariosEmpresa/EditUsuario', compact('user'));

    }
    
    public function updateUser(Request $request){
        $id = $request->id;
        $user = User::findOrFail($id);
        // dd($User);
        $user->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => $request->password,
            'rol_id' => $request->rol_id,
            'entidad_id' => $request->entidad_id,
        ]);
        return Redirect::route('indexUser');
    }

    public function destroyUser($id)
    {
        $evento = User::findOrFail($id);
        $evento->delete();
        return back();
    }
 


=======
>>>>>>> sergio
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
<<<<<<< HEAD
        // No registra con el validate por alguna razón
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:' . User::class,
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // Busca si existe la organizacion a registrar
        $idOrg = DB::select('select * from entidad where nombre = ?', [$request->nombre_empresa]);

        // Si no existe en la base de datos esta empresa
        if ($idOrg == null) {
            // Se crea la empresa
            $org = DB::insert(
                'insert into entidad (nombre, ubicacion, web, descripcion, tamano, numero_tarjeta) values (?, ?, ?, ?, ?, ?)',
                [$request->nombre_empresa, 'Ubicacion', 'Web', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium quae cum saepe veritatis, incidunt assumenda quibusdam numquam beatae animi harum soluta quos nihil qui quaerat sequi alias sint veniam quisquam!', 1, $request->nif]
            );

            $idOrg = DB::select('select * from entidad where nombre = ?', [$request->nombre_empresa]);

            $empresa = DB::insert('insert into empresa (entidad_id) values (?)', [$idOrg[0]->id]);
        }

        // Mira si existe el usuario a registrar dentro de la entidad
        $userExist = DB::select('select users.id, users.nombre, users.email, users.entidad_id, entidad.nombre, entidad.descripcion
        from maat.users
        inner join maat.entidad on entidad.id = users.entidad_id
        where entidad.nombre = ? and users.email = ?', [$request->nombre_empresa, $request->correo]);

        // Mira si existe el email a registrar
        $emailExist = DB::select('select users.id, users.email
        from maat.users
        where users.email = ?', [$request->correo]);

        // Mira si ya existe un empleado dentro de esa empresa (solo se permite 1 por empleado)
        $employees = DB::select('select count(users.id) as empleados
        from maat.users
        inner join maat.entidad on entidad.id = users.entidad_id
        where entidad.nombre = ?', [$request->nombre_empresa]);

        // Si no existe el usuario en la organización y el email a registrar no existe
        if ($userExist == null && $emailExist == null && $employees[0]->empleados == 0) {
            // Se crea usuario administrador de esa organizacion
            $user = User::create([
                'nombre' => $request->nombre,
                // 'dni'=>$request->dni,
                'email' => $request->correo,
                'password' => Hash::make($request->password),
                'activo' => 1,
                'rol_id' =>  $request->rol,
                'entidad_id' => $idOrg[0]->id
            ]);

            event(new Registered($user));

            Auth::login($user);
        }

        // Te devuelve o al dashboard (si se registra correctamente, o al login si no). Depende del Auth
=======
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

>>>>>>> sergio
        return redirect(RouteServiceProvider::HOME);
    }
}
