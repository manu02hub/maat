<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\asociaciones_contratadas;
use App\Models\Empresa;
use App\Models\Organizaciones;
use App\Models\plan_contratado;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class MatchController extends Controller
{
    public function match(Request $request, $id)
    {


        $id_entidad_empresa = auth()->user()->entidad_id;
        //Validar que la empresa tenga un plan

        $id_empresa = Empresa::where('entidad_id', $id_entidad_empresa)->first();

        $plan_contratado = plan_contratado::where('empresa_id', $id_empresa->id)->first();
        // dd($plan_contratado);

        /**Comprobamos que tiene un plan contratado */
        if ($plan_contratado === null) {
            /**Si no hay plan contratado, que el empresario reciba un feedback de que tiene que comprar un plan */
            dd("No hay plan contratado");
        } else {
            /**En caso de tener un plan contratado, la empresa podra pasar a contratar esa organizacion */
            // dd($plan_contratado->id);
            $puede_contrarat = true;
            $asociaciones_contratadas = asociaciones_contratadas::where('plan_contratado_id', $plan_contratado->id)->count();
            // dd($asociaciones_contratadas);
            if ($plan_contratado->tipos_plan_id === 1) {
                // dd("puede contrartar 2 organizacion");
                if ($asociaciones_contratadas >= 2) {
                    dd('no puedes tener mas de dos asociaciones contratadas, para poder contratar mas organizaciones, revise los planes');
                } else {
                    // dd('estas dentro de las asociaciones');
                    $puede_contrarat = true;
                }
            } else if ($plan_contratado->tipos_plan_id === 2) {
                // dd("puede contrartar 5 organizacion");
                if ($asociaciones_contratadas >= 5) {
                    dd('no puedes tener mas de cinco asociaciones contratadas, para poder contratar mas organizaciones, revise los planes');
                } else {
                    // dd('estas dentro de las asociaciones');
                    $puede_contrarat = true;
                }
            } else if ($plan_contratado->tipos_plan_id === 3) {
                // dd("puede contrartar 12 organizacion");
                if ($asociaciones_contratadas >= 12) {
                    dd('no puedes tener mas de doce asociaciones contratadas, para poder contratar mas organizaciones, revise los planes');
                } else {
                    // dd('estas dentro de las asociaciones');
                    $puede_contrarat = true;
                }
            } else if ($plan_contratado->tipos_plan_id === 4) {
                // dd("puede contrartar 1 organizacion");
                if ($asociaciones_contratadas >= 1) {
                    dd('no puedes tener mas de una asociaciones contratadas, para poder contratar mas organizaciones, revise los planes');
                } else {
                    // dd('estas dentro de las asociaciones');
                    $puede_contrarat = true;
                }
            }
        }
        $id_entidad = Organizaciones::where('entidad_id', $id)->first();
        if ($puede_contrarat) {
            $registrarPlan = new asociaciones_contratadas();
            $registrarPlan->plan_contratado_id = $plan_contratado->id;
            $registrarPlan->organizacion_id = $id_entidad->id;
            $registrarPlan->save();
            return back();
        }

        //Una vez validado que tiene plna, consultar que plann tiene, y realizar el match entre la ONG y la Empresa


        //Detectar si la organizacion esta contratada
    }
}
