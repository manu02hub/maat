<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eventos;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class EventoController extends Controller
{
    public function index()
    {
        $evento = Eventos::all();

        return Inertia::render('PrivateMaat/Evento/EventoIndex', compact('evento'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Evento/EventoCreate');
    }

    public function store(Request $request)
    {
        $evento = new Eventos();
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->fecha_final = $request->fecha_final;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_final = $request->hora_final;
        $evento->plazas = $request->plazas;
        $evento->organizacion_id = $request->organizacion_id;
        $evento->save();

        return Redirect::route('indexEvento');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $evento = Eventos::findOrFail($id);
        return Inertia::render('PrivateMaat/Evento/EventoEdit', compact('evento'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $evento = Eventos::findOrFail($id);

        $evento->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'hora_inicio' => $request->hora_inicio,
            'hora_final' => $request->hora_final,
            'plazas' => $request->plazas,
            'organizacion_id' => $request->organizacion_id,
        ]);

        return Redirect::route('indexEvento');
    }

    //DELETE
    public function destroy($id)
    { 
        $evento = Eventos::findOrFail($id);
        $evento->delete();
        return back();
    }
}
