<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ListadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Obtiene un listado de las empresas u organizaciones dependiendo de la entidad a la que pertenece
    // el usuario
    public function getListado(Request $request)
    {
        try {
            // Guarda en $ong todas la organizacion de tipo ong que cumpla con el requisito
            $ong = DB::select('select * from betec_maat.organizacion
            inner join betec_maat.entidad on organizacion.entidad_id = entidad.id
            where entidad.id = ?', [$request->id]);

            // Guarda en $empr todas la organizacion de tipo empresa que cumpla con el requisito
            $empr = DB::select('select * from betec_maat.empresa
            inner join betec_maat.entidad on empresa.entidad_id = entidad.id
            where entidad.id = ?', [$request->id]);

            // Es ONG por lo que va a mostrar las organizaciones de tipo empresa
            if (count($ong) == 1) {
                $recentContact = DB::select('select entidad.id, entidad.nombre, entidad.descripcion
                from betec_maat.chat
                inner join betec_maat.entidad on entidad.id = chat.empresa_id
                where organizacion_id = ?', [$request->id]);

                $ong  = DB::select('select * from betec_maat.empresa
                inner join betec_maat.entidad on empresa.entidad_id = entidad.id');

                // Envía los resultados obtenidos
                return ['recientes' => $recentContact, 'organizacion' => $ong];
                // Es empresa por lo que va a mostrar las organizaciones de tipo ONG
            } else if (count($empr) == 1) {
                $recentContact = DB::select('select entidad.id, entidad.nombre, entidad.descripcion
                from betec_maat.chat
                inner join betec_maat.entidad on entidad.id = chat.organizacion_id
                where empresa_id = ?', [$request->id]);

                $empr = DB::select('select * from betec_maat.organizacion
                inner join betec_maat.entidad on organizacion.entidad_id = entidad.id');

                // Envía los resultados obtenidos
                return ['recientes' => $recentContact, 'organizacion' => $empr];
            } else {
                // Te devuelve al listado (acceso desde el metodo en url)
                return Inertia::render('private/Alex/ListadoCliente');
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // Obtiene el perfil publico de la entidad escogida
    public function getPerfilP($id)
    {
        try {
            // Mira si existe la entidad a llamar
            $orgs = DB::select('select * from betec_maat.entidad where entidad.id = ?', [$id]);

            // Guarda en $orgData los datos de la organizacion de manera ascendente
            // (administradores > empleados)
            $orgData = DB::select('select users.nombre as empleado, users.email, users.rol_id, entidad.id as org,
            entidad.nombre, entidad.logo, entidad.ubicacion, entidad.web, entidad.descripcion, entidad.tamano,
            entidad.numero_tarjeta
            from betec_maat.entidad
            inner join betec_maat.users on users.entidad_id = entidad.id
            where entidad.id = ?
            order by users.rol_id asc', [$id]);

            // Mira si es una ONG o no
            $ong = DB::select('select * from betec_maat.entidad
            inner join betec_maat.organizacion on entidad.id = organizacion.entidad_id
            where entidad.id = ?', [$id]);

            // Envía los resultados obtenidos
            if (count($orgs) == 1 && count($orgData) != 0) {
                return Inertia::render('private/Alex/PerfilPublic', ['datos' => $orgData, 'isOng' => count($ong)]);
            } else {
                return Inertia::render('private/Alex/ListadoCliente');
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
