<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Failed_jobs;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class FailedJobsController extends Controller
{
    public function index()
    {
        $failed_job = Failed_jobs::all();

        return Inertia::render('PrivateMaat/Failed_jobs/Failed_jobsIndex', compact('failed_job'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Failed_jobs/Failed_jobsCreate');
    }

    public function store(Request $request)
    {
        $failed_job = new Failed_jobs();
        $failed_job->nombre = $request->nombre;
        $failed_job->descripcion = $request->descripcion;
        $failed_job->ubicacion = $request->ubicacion;
        $failed_job->fecha_inicio = $request->fecha_inicio;
        $failed_job->fecha_final = $request->fecha_final;
        $failed_job->hora_inicio = $request->hora_inicio;
        $failed_job->hora_final = $request->hora_final;
        $failed_job->plazas = $request->plazas;
        $failed_job->organizacion_id = $request->organizacion_id;
        $failed_job->save();

        return Redirect::route('indexFailed_job');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $failed_job = Failed_jobs::findOrFail($id);
        return Inertia::render('PrivateMaat/Failed_jobs/Failed_jobsEdit', compact('failed_job'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $failed_job = Failed_jobs::findOrFail($id);

        $failed_job->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'hora_inicio' => $request->hora_inicio,
            'hora_final' => $request->hora_final,
            'plazas' => $request->plazas,
            'organizacion_id' => $request->organizacion_id,
        ]);

        return Redirect::route('indexFailed_job');
    }

    //DELETE
    public function destroy($id)
    { 
        $failed_job = Failed_jobs::findOrFail($id);
        $failed_job->delete();
        return back();
    }
}
