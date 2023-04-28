<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ProfileEmprController extends Controller
{
    // Alex
    /**
     * Coge los datos de la empresa del usuario iniciado sesion
     */
    public function getEmpr(Request $request)
    {
        // Incluye empleados por si se usan
        $org = DB::select('select users.id, users.nombre, users.email, users.entidad_id, entidad.nombre,
        entidad.logo, entidad.ubicacion, entidad.web, entidad.descripcion, entidad.tamano,
        entidad.numero_tarjeta
        from maat.users
        inner join maat.entidad on entidad.id = users.entidad_id
        where entidad.id = ?', [$request->empresa]);

        return $org;
    }

    // Edita los datos de la empresa
    public function editEmpr(Request $request)
    {
        // Actualiza por los nuevos datos recibidos
        $update = DB::update("update maat.entidad set nombre = ?,
        logo = ?, ubicacion = ?, web = ?, descripcion = ?, numero_tarjeta = ?
        where id = ?", [
            $request->name, '', $request->ubicacion, $request->web, $request->descripcion,
            $request->numTar, $request->entidad
        ]);
    }

    // Elimina la empresa y todos los usuarios asociados a esta
    public function deleteEmpr(Request $request)
    {
        $admins = DB::select('select email, rol_id, entidad_id from maat.users
        where rol_id = 1 and entidad_id = ?', [$request->entidad]);

        // Si hay solo 1 administrador de la empresa, se elimina todos los datos de la empresa
        if (count($admins) == 1) {
            // Elimina de la tabla empresa
            $delete = DB::delete('delete from maat.empresa where entidad_id = ?', [
                $request->entidad
            ]);

            // Elimina la empresa y todos los datos asociados a esta
            $delete = DB::delete('delete from maat.entidad where id = ?', [
                $request->entidad
            ]);

            // Elimina todos los usuarios de la empresa
            $delete = DB::delete('delete from maat.users where entidad_id = ?', [
                $request->entidad
            ]);
        }
    }
}