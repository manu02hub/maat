<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Users;
use App\Models\Entidad;
use App\Models\Organizaciones;
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
        // Si es falso, se está intentando registrar empresa
        if ($request->clientOng == false) {
            // Busca si existe la empresa a registrar
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
                    'nombre' => $request->nombre_empresa,
                    'email' => $request->correo,
                    'password' => Hash::make($request->password),
                    'activo' => 1,
                    'rol_id' => 2,
                    'entidad_id' => $idOrg[0]->id
                ]);

                event(new Registered($user));

                Auth::login($user);
            }

            // Cuando es una ONG
        } else {
            $idOrganizacion = Entidad::where('nombre', $request->nombre_empresa)->first();

            // dd($idOrganizacion);

            if ($idOrganizacion == null) {
                $organizacion = Entidad::create([
                    'nombre' => $request->nombre_empresa,
                    'ubicacion' => 'ubicacion',
                    'web' => 'web',
                    'descripcion' => 'descripcion',
                    'tamano' => '12',
                    'numero_tarjeta' => $request->nif
                ]);

                $idOrganizacion = Entidad::where('nombre', $request->nombre_empresa)->first();

                $organizacion = Organizaciones::create([
                    'entidad_id' => $idOrganizacion->id
                ]);
            }

            // Mira si existe el usuario a registrar dentro de la entidad
            $userExist = Users::select('users.id', 'users.nombre', 'users.email', 'users.entidad_id', 'entidad.nombre', 'entidad.descripcion')
            ->join('entidad', 'entidad.id', '=', 'users.entidad_id')
            ->where('entidad.nombre', $request->nombre_empresa)
            ->where('users.email', $request->correo)
            ->exists();

            // $userExist = DB::select('select users.id, users.nombre, users.email, users.entidad_id, entidad.nombre, entidad.descripcion
            // from maat.users
            // inner join maat.entidad on entidad.id = users.entidad_id
            // where entidad.nombre = ? and users.email = ?', [$request->nombre_empresa, $request->correo]);

            // dd($userExist);
            // Mira si existe el email a registrar
            $emailExist = Users::select('users.id', 'users.email')
            ->where('users.email', $request->correo)
            ->exists();

            // Mira si ya existe un empleado dentro de esa empresa (solo se permite 1 por empleado)
            // $empleados = Users::join('entidad', 'entidad.id', '=', 'users.entidad_id')
            // ->where('entidad.nombre', $request->nombre_empresa)
            // ->count();

            $employees = DB::select('select count(users.id) as empleados
            from maat.users
            inner join maat.entidad on entidad.id = users.entidad_id
            where entidad.nombre = ?', [$request->nombre_empresa]);

            // dd($empleados);
            // Si no existe el usuario en la organización y el email a registrar no existe
            if ($userExist == false  && $emailExist == false && $employees[0]->empleados == 0) {
                $idOrg = DB::select('select * from entidad where nombre = ?', [$request->nombre_empresa]);
                // Se crea usuario administrador de esa organizacion
                // dd('todo fue bien');
                // $user = Users::create([
                //     'nombre' => $request->nombre_empresa,
                //     'email' => $request->correo,
                //     'password' => Hash::make($request->password),
                //     'activo' => 1,
                //     'rol_id' => 1,
                //     'entidad_id' => $idOrganizacion[0]->id
                // ]);

                $user=new Users();
                $user->nombre=$request->nombre_empresa;
                $user->email=$request->correo;
                $user->password=Hash::make($request->password);
                $user->activo=1;
                $user->rol_id=1;
                $user->entidad_id=$idOrg[0]->id;
                $user->save();
                event(new Registered($user));

                // Auth::login($user);
            } else {
                dd($userExist.'---'.$emailExist.'---'.$employees[0]->empleados);
            }
        }

        // Te devuelve o al dashboard (si se registra correctamente, o al login si no). Depende del Auth
        return redirect(RouteServiceProvider::HOME);
    }
}
