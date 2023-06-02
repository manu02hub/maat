<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Entidad;
use App\Models\Organizaciones;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class OrganizacionesController extends Controller
{
    public function getONG(Request $request)
    {

        $org2 = Users::select(
                'users.id',
                'users.nombre',
                'users.email',
                'users.entidad_id',
                'entidad.nombre',
                'entidad.logo',
                'entidad.ubicacion',
                'entidad.web',
                'entidad.descripcion',
                'entidad.tamano',
                'entidad.numero_tarjeta'
            )
            ->join('entidad', 'entidad.id', '=', 'users.entidad_id')
            ->where('entidad.id', '=', $request->organizacion)
            ->get();

        return $org2;
    }

    public function editONG(Request $request)
    {

        $update = Entidad::where('id', $request->entidad)
            ->update([
                'nombre' => $request->name,
                'logo' => '',
                'ubicacion' => $request->ubicacion,
                'web' => $request->web,
                'descripcion' => $request->descripcion,
                'numero_tarjeta' => $request->numTar
            ]);

        // $orgUpdate = Entidad::save();
    }

    public function deleteONG(Request $request)
    {
        $admins = Users::select('email', 'rol_id', 'entidad_id')
            ->where('rol_id', 1)
            ->where('entidad_id', $request->entidad)
            ->get();

        if ($admins->count() == 1) {
            $delete = Users::where('entidad_id', $request->entidad)
                ->delete();

            $delete = Organizaciones::where('entidad_id', $request->entidad)
                ->delete();

            $delete = Entidad::where('id', $request->entidad)
                ->delete();

                return Redirect::route('index');
        }
    }
}
