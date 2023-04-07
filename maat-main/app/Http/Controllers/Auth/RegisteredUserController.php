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
use Inertia\Inertia;
use Inertia\Response;

use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
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
                'insert into entidad (nombre, ubicacion, web, descripcion, tamano) values (?, ?, ?, ?, ?)',
                [$request->nombre_empresa, 'Ubicacion', 'Web', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium quae cum saepe veritatis, incidunt assumenda quibusdam numquam beatae animi harum soluta quos nihil qui quaerat sequi alias sint veniam quisquam!', 1]
            );

            $idOrg = DB::select('select * from entidad where nombre = ?', [$request->nombre_empresa]);

            $empresa = DB::insert('insert into empresa (entidad_id) values (?)', [$idOrg[0]->id]);
        }

        // Mira si existe el usuario
        $userExist = DB::select('select users.id, users.nombre, users.email, users.entidad_id, entidad.nombre, entidad.descripcion
        from maat.users
        inner join maat.entidad on entidad.id = users.entidad_id
        where entidad.nombre = ? and users.email = ?', [$request->nombre_empresa, $request->correo]);

        // Mira si existe el email a registrar
        $emailExist = DB::select('select users.id, users.email
        from maat.users
        where users.email = ?', [$request->correo]);

        // Si no existe el usuario en la organización y el email a registrar no existe
        if ($userExist == null && $emailExist == null) {
            // Se crea usuario administrador de esa organizacion
            $user = User::create([
                'nombre' => $request->nombre_empresa,
                'email' => $request->correo,
                'password' => Hash::make($request->password),
                'activo' => 1,
                'rol_id' => 1,
                'entidad_id' => $idOrg[0]->id
            ]);

            event(new Registered($user));

            Auth::login($user);
        }

        // Te devuelve o al dashboard (si se registra correctamente, o al login si no). Depende del Auth
        return redirect(RouteServiceProvider::HOME);
    }
}
