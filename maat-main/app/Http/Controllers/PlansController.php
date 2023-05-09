<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Models\Users;
use App\Models\plan_contratado;
use App\Models\asociaciones_contratadas;
use App\Models\Empresa;
use App\Models\Entidad;
use App\Models\img_eventos;
use App\Models\Organizaciones;
use App\Models\Planes;
use App\Models\Rol;
use App\Models\tipos_plan;
use App\Models\user_has_evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class PlansController extends Controller
{
    public function index()
    {
        $planes = Planes::all();

        /*-----------------------{{Descarte de botones}}-----------------------*/
        /**Ver si lo que esta registrado es un administrador de empresa */
        $usuario = Users::select('users.*', 'rol.nombre as nombre_rol')
            ->join('rol', 'users.rol_id', '=', 'rol.id')
            ->where('rol.nombre', '=', 'adminEmpresa')
            ->first();
        $entidad_id = $usuario->entidad_id;
        $enlaceEmpresa_Entidad = Empresa::where('entidad_id', $entidad_id)->first();
        /**Saber si la empresa tiene algun tipo de plan */
        $existePlan = plan_contratado::where('empresa_id', $enlaceEmpresa_Entidad->id)->first();
        /**Verifico si existe un plan, en caso de que exista, filtrar cual es el que tiene, e indicarselo al empresario */
        if ($existePlan) {
            // dd('existe plan');
            $existePlanValidator = true;
            /**Paquete que tiene contratado */
            $plan = tipos_plan::where('id', $existePlan->tipos_plan_id)->first();
            /**Planes que hay*/
            $tipos_plan = tipos_plan::pluck('nombre');
            return Inertia::render('private/Manu/Plans', compact('planes', 'tipos_plan', 'existePlanValidator', 'plan'));
        } else {
            // dd('no existe plan');
            $existePlanValidator = false;
            return Inertia::render('private/Manu/Plans', compact('planes', 'existePlanValidator'));
        }
        /*---------------------------------------------------------------------*/
    }

    public function joinPlan($id)
    {
        /**Veo que el usuario es una empresa */
        $usuario = Users::select('users.*', 'rol.nombre as nombre_rol')
            ->join('rol', 'users.rol_id', '=', 'rol.id')
            ->where('rol.nombre', '=', 'adminEmpresa')
            ->first();
        /**En caso de serlo, obtengo la empresa a la que pertenece */
        $entidad_id = $usuario->entidad_id;
        /**Obtengo la empresa y la entidad que es*/
        $enlaceEmpresa_Entidad = Empresa::where('entidad_id', $entidad_id)->first();

        dd($enlaceEmpresa_Entidad);
        return back();
    }

    /**Si la empresa no tiene ningun plan, podra contratarlo */
    public function deposePlan($id)
    {
        /**Veo que el usuario es una empresa */
        $usuario = Users::select('users.*', 'rol.nombre as nombre_rol')
            ->join('rol', 'users.rol_id', '=', 'rol.id')
            ->where('rol.nombre', '=', 'adminEmpresa')
            ->first();
        /**En caso de serlo, obtengo la empresa a la que pertenece */
        $entidad_id = $usuario->entidad_id;
        /**Obtengo la empresa y la entidad que es*/
        $enlaceEmpresa_Entidad = Empresa::where('entidad_id', $entidad_id)->first();

        /**Objeto de plan contratado */
        $joinPlan = new plan_contratado();
        $joinPlan->activo = 1;
        $plan =  tipos_plan::find($id);
        // dd($plan->duracion);
        $joinPlan->fecha_inicio = now();
        if ($plan->duracion == "3 meses") {
            $joinPlan->fecha_fin = date('Y-m-d H:i:s', strtotime('+4 months'));
        } else if ($plan->duracion == "6 meses") {
            $joinPlan->fecha_fin = date('Y-m-d H:i:s', strtotime('+7 months'));
        } else if ($plan->duracion == "1 año") {
            $joinPlan->fecha_fin = date('Y-m-d H:i:s', strtotime('+13 months'));
        } else if ($plan->duracion == "1 mes") {
            $joinPlan->fecha_fin = date('Y-m-d H:i:s', strtotime('+2 months'));
        }
        $joinPlan->tipos_plan_id = $id;
        $joinPlan->empresa_id = $enlaceEmpresa_Entidad->id;
        $joinPlan->save();
        return back();
    }
}
