<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Asociaciones_contratadas;
use App\Models\Empresa;
use App\Models\Organizaciones;
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

            try {
                // Mira si es ONG antes de hacer las siguientes operaciones
                if (count($ong) >= 1) {
                    //ver la asociacion en la tabla de asociaciones contratadas
                    //busco al endidad por organizacion
                    $id_organizacion = Organizaciones::where('entidad_id', $id)->first();
                    // dd($id_organizacion->id);

                    //busco la organizacion en la tabla de asociaciones contratadas,
                    $asociaciones_contratadas = Asociaciones_contratadas::where('organizacion_id', $id_organizacion->id)->get();

                    $id_empresa = Empresa::where('entidad_id', auth()->user()->entidad_id)->first();
                    $asociacion_contratada = Asociaciones_contratadas::where('organizacion_id', $id_organizacion->id)
                        ->join('plan_contratado', 'asociaciones_contratadas.plan_contratado_id', '=', 'plan_contratado.id')
                        ->where('plan_contratado.empresa_id', $id_empresa->id)
                        ->exists();
                }
            } catch (\Throwable $th) {
                echo $th;
            }

            // Envía los resultados obtenidos
            if (count($orgs) == 1 && count($orgData) != 0) {
                // Dependiendo de si el usuario es ONG o no, te da en la pantalla unos datos u otros
                if (count($ong) >= 1) {
                    return Inertia::render('private/Alex/PerfilPublic', ['datos' => $orgData, 'isOng' => count($ong), 'validador_contrato' => $asociacion_contratada]);
                } else {
                    return Inertia::render('private/Alex/PerfilPublic', ['datos' => $orgData, 'isOng' => count($ong)]);
                }
            } else {
                return Inertia::render('private/Alex/ListadoCliente');
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
