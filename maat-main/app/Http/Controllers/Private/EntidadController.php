<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entidad;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class EntidadController extends Controller
{
    public function index()
    {
        $entidad = Entidad::all();

        return Inertia::render('PrivateMaat/Entidad/EntidadIndex', compact('entidad'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Entidad/EntidadCreate');
    }

    public function store(Request $request)
    {
        $entidad = new Entidad();
        $entidad->nombre = $request->nombre;
        $entidad->logo = $request->logo;
        $entidad->ubicacion = $request->ubicacion;
        $entidad->web = $request->web;
        $entidad->descripcion = $request->descripcion;
        $entidad->tamano = $request->tamano;
        $entidad->numero_tarjeta = $request->numero_tarjeta;
        $entidad->save();

        return Redirect::route('indexEntidad');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $entidad = Entidad::findOrFail($id);
        return Inertia::render('PrivateMaat/Entidad/EntidadEdit', compact('entidad'));

    }

    public function update(Request $request)
    {
        $id = $request->id;
        $entidad = Entidad::findOrFail($id);

        $entidad->update([
            'entidad_id' => $request->entidad_id,
            'nombre' => $request->nombre,
            'logo' => $request->logo,
            'ubicacion' => $request->ubicacion,
            'web' => $request->web,
            'descripcion' => $request->descripcion,
            'tamano' => $request->tamano,
            'numero_tarjeta' => $request->numero_tarjeta,
        ]);

        return Redirect::route('indexEntidad');
    }

    //DELETE
    public function destroy($id)
    { 
        $entidad = Entidad::findOrFail($id);
        $entidad->delete();
        return back();
    }
}
