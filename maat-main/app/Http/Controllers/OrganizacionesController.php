<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Entidad;
use App\Models\Organizaciones;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class OrganizacionesController extends Controller
{
    // Alex
    /**
     * Coge los datos de la empresa del usuario iniciado sesion
     */
    public function getONG(Request $request)
    {
        // Incluye empleados por si se usan
        // $org = DB::select('select users.id, users.nombre, users.email, users.entidad_id, entidad.nombre,
        // entidad.logo, entidad.ubicacion, entidad.web, entidad.descripcion, entidad.tamano,
        // entidad.numero_tarjeta
        // from maat.users
        // inner join maat.entidad on entidad.id = users.entidad_id
        // where entidad.id = ?', [$request->empresa]);

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

    // Edita los datos de la empresa
    public function editONG(Request $request)
    {
        // Actualiza por los nuevos datos recibidos
        // $update = DB::update("update maat.entidad set nombre = ?,
        // logo = ?, ubicacion = ?, web = ?, descripcion = ?, numero_tarjeta = ?
        // where id = ?", [
        //     $request->name, '', $request->ubicacion, $request->web, $request->descripcion,
        //     $request->numTar, $request->entidad
        // ]);

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

    // Elimina la empresa y todos los usuarios asociados a esta
    public function deleteONG(Request $request)
    {
        $admins = Users::select('email', 'rol_id', 'entidad_id')
            ->where('rol_id', 1)
            ->where('entidad_id', $request->entidad)
            ->get();

        // Si hay solo 1 administrador de la empresa, se elimina todos los datos de la empresa
        if ($admins->count() == 1) {
            // Delete all users of the company
            $delete = Users::where('entidad_id', $request->entidad)
                ->delete();

            // Delete from the "empresa" table
            $delete = Organizaciones::where('entidad_id', $request->entidad)
                ->delete();

            // Delete the company and all associated data
            $delete = Entidad::where('id', $request->entidad)
                ->delete();


        }
    }
}
