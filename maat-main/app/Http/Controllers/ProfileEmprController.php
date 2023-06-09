<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileEmprController extends Controller
{
    // Alex
    /**
     * Coge los datos de la empresa del usuario iniciado sesion
     */
    public function getEmpr(Request $request)
    {

        try {
            // Incluye empleados por si se usan
            $org = DB::select('select users.id, users.nombre, users.email, users.entidad_id, entidad.nombre,
            entidad.logo, entidad.ubicacion, entidad.web, entidad.descripcion, entidad.tamano,
            entidad.numero_tarjeta
            from betec_maat.users
            inner join betec_maat.entidad on entidad.id = users.entidad_id
            where entidad.id = ?', [$request->empresa]);

            return $org;
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // Edita los datos de la empresa
    public function editEmpr(Request $request)
    {

        try {
            // Actualiza por los nuevos datos recibidos
            $update = DB::update("update betec_maat.entidad set nombre = ?,
            logo = ?, ubicacion = ?, web = ?, descripcion = ?, numero_tarjeta = ?
            where id = ?", [
                $request->name, '', $request->ubicacion, $request->web, $request->descripcion,
                $request->numTar, $request->entidad
            ]);
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // Elimina la empresa y todos los usuarios asociados a esta
    public function deleteEmpr(Request $request)
    {
        // Validación de contraseña
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);

        // Si se valida correctamente, te devuelve el usuario admin actual
        $user = $request->user();

        try {
            $admins = DB::select('select email, rol_id, entidad_id from betec_maat.users
            where rol_id = 2 and entidad_id = ?', [$user->entidad_id]);

            // Si hay solo 1 administrador de la empresa, se elimina todos los datos de la empresa
            if (count($admins) == 1) {
                $searchToDel = DB::select('select * from betec_maat.plan_contratado where empresa_id = ?', [
                    $user->entidad_id
                ]);

                // Mira si existe antes de hacer las operaciones de eliminar
                if (count($searchToDel) == 1) {
                    // Elimina de la tabla mensaje
                    $delete = DB::delete('delete from betec_maat.asociaciones_contratadas
                    where id = ?', [
                        $searchToDel[0]->id
                    ]);

                    // Elimina de la tabla mensaje
                    $delete = DB::delete('delete from betec_maat.plan_contratado
                    where empresa_id = ?', [
                        $user->entidad_id
                    ]);
                }

                // Elimina de la tabla mensaje
                $delete = DB::delete('delete from betec_maat.mensaje where id_origen = ? or id_destino = ?', [
                    $user->entidad_id, $user->entidad_id
                ]);

                // Elimina de la tabla chat
                $delete = DB::delete('delete from betec_maat.chat where empresa_id = ?', [
                    $user->entidad_id
                ]);

                // Elimina de la tabla empresa
                $delete = DB::delete('delete from betec_maat.empresa where entidad_id = ?', [
                    $user->entidad_id
                ]);

                // Elimina todos los usuarios de la empresa
                $delete = DB::delete('delete from betec_maat.users where entidad_id = ?', [
                    $user->entidad_id
                ]);

                // Elimina la empresa y todos los datos asociados a esta
                $delete = DB::delete('delete from betec_maat.entidad where id = ?', [
                    $user->entidad_id
                ]);

                // Sale de sesión
                Auth::logout();
            } else {
                // En el caso de más de 1 admin en la entidad, solo se eliminará el usuario
                Auth::logout();
                $user->delete();
            }

            // Nuevo tokens
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
