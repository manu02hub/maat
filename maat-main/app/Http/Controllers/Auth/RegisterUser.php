<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\DB;

class RegisterUser extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    public function indexUserEmpresa(Request $request)
    {
        $entidad_id = auth()->user()->entidad_id;
        $user = Users::where('entidad_id', $entidad_id)
            ->skip(1) // Excluye el primer usuario
            ->take(PHP_INT_MAX) // Obtén todos los demás usuarios
            ->get();
        return Inertia::render('private/Sergio/UsuariosEmpresa/Listado', compact('user'));
    }
    public function indexUserONG(Request $request)
    {
        $entidad_id = auth()->user()->entidad_id;
        $user = Users::where('entidad_id', $entidad_id)
            ->skip(1) // Excluye el primer usuario
            ->take(PHP_INT_MAX) // Obtén todos los demás usuarios
            ->get();
        return Inertia::render('private/Sergio/UsuariosONG/Listado', compact('user'));
    }

    public function newUserONG(Request $request)
    {
        return Inertia::render('private/Sergio/UsuariosONG/InfoUsuario');
    }

    public function newUserEmpresa(Request $request)
    {
        return Inertia::render('private/Sergio/UsuariosEmpresa/InfoUsuario');
    }

    public function indexAuthUser(Request $request)
    {
        $user = Users::all();
        return Inertia::render('private/Piero/PerfilUsuario', compact('user'));
    }

    public function createUserONG(Request $request)
    {
        // dd("Se va a crear un usuario de ONG");
        $user = new Users();
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rol_id = 3;
        $user->entidad_id = auth()->user()->entidad_id;
        $user->save();
        return Redirect::route('indexUserONG');
    }
    public function createUserEmpresa(Request $request)
    {
        // dd("Se va a crear un usuario de Empresa");
        $user = new Users();
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rol_id = 3;
        $user->entidad_id = auth()->user()->entidad_id;
        $user->save();
        return Redirect::route('indexUserEmpresa');
    }

    public function editUserEmpresa($id)
    {
        $user = Users::findOrFail($id);
        // dd($user);
        // return Inertia::render('private/Sergio/UsuariosEmpresa/EditarUsuario', compact('user'));
        return Inertia::render('private/Sergio/UsuariosEmpresa/EditUsuario', compact('user'));
    }

    public function editUserONG($id)
    {
        $user = Users::findOrFail($id);
        // dd($user);
        // return Inertia::render('private/Sergio/UsuariosEmpresa/EditarUsuario', compact('user'));
        return Inertia::render('private/Sergio/UsuariosONG/EditUsuario', compact('user'));
    }



    public function editUser($id){
        $user = Users::findOrFail($id);
        // dd($user);
        // return Inertia::render('private/Sergio/UsuariosEmpresa/EditarUsuario', compact('user'));
        return Inertia::render('private/Sergio/EditUsuario', compact('user'));
    }

    public function updateUserEmpresa(Request $request)
    {
        $id = $request->id;
        $user = Users::findOrFail($id);
        // dd($user);
        if ($request->password == null && $request->password_confirmation == null) {
            $user->update([
                'nombre' => $request->nombre,
                'email' => $request->email,
            ]);
        } else {
            if ($request->password === $request->password_confirmation) {
                $user->update([
                    'nombre' => $request->nombre,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
            } else {
                dd("Las contraseñas no coinciden");
            }
        }
        return Redirect::route('indexUserEmpresa');
    }

    public function updateUserONG(Request $request)
    {
        $id = $request->id;
        $user = Users::findOrFail($id);
        // dd($user);
        if ($request->password == null && $request->password_confirmation == null) {
            $user->update([
                'nombre' => $request->nombre,
                'email' => $request->email,
            ]);
        } else {
            if ($request->password === $request->password_confirmation) {
                $user->update([
                    'nombre' => $request->nombre,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
            } else {
                dd("Las contraseñas no coinciden");
            }
        }
        return Redirect::route('indexUserONG');
    }

    public function updateUser(Request $request){
        $id = $request->id;
        $user = Users::findOrFail($id);
        // dd($user);
        // dd( $request->nombre);
        $user->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            // 'password' => $request->password,
            // 'rol_id' => $request->rol_id,
            // 'entidad_id' => $request->entidad_id,
        ]);
        return Redirect::route('recogerPerfil');
    }

    public function destroyUser($id)
    {
        $evento = Users::findOrFail($id);
        $evento->delete();
        return back();
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
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
            $user = Users::create([
                'nombre' => $request->nombre,
                // 'dni'=>$request->dni,
                'email' => $request->correo,
                'password' => Hash::make($request->password),
                'activo' => 1,
                'rol_id' =>  3,
                'entidad_id' => $idOrg[0]->id
            ]);

            event(new Registered($user));

            Auth::login($user);
        }

        // Te devuelve o al dashboard (si se registra correctamente, o al login si no). Depende del Auth
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
