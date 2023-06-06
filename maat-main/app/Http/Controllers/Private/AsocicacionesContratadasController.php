<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asociaciones_contratadas;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;


class AsocicacionesContratadasController extends Controller
{
    //INDEX
    public function index()
    {
        $asociacionesContratadas = Asociaciones_contratadas::all();

        return Inertia::render('PrivateMaat/AsocicacionesContratadas/AsocicacionesContratadasIndex', compact('asociacionesContratadas'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/AsocicacionesContratadas/AsocicacionesContratadasCreate');
    }

    public function store(Request $request)
    {
        $asociacionesContratadas = new Asociaciones_contratadas();
        $asociacionesContratadas-> plan_contratado_id = $request->plan_contratado_id;
        $asociacionesContratadas-> organizacion_id = $request->organizacion_id;
        $asociacionesContratadas->save();
        return Redirect::route('indexAsocicacionesContratadas');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $asociacionesContratadas = Asociaciones_contratadas::findOrFail($id);
        return Inertia::render('PrivateMaat/AsocicacionesContratadas/AsocicacionesContratadasEdit', compact('asociacionesContratadas'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $asociacionesContratadas = Asociaciones_contratadas::findOrFail($id);

        $asociacionesContratadas->update([
            'plan_contratado_id' => $request->plan_contratado_id,
            'organizacion_id' => $request->organizacion_id,
        ]);

        return Redirect::route('indexAsocicacionesContratadas');
    }

    //DELETE
    public function destroy($id)
    {
        $asociacionesContratadas = Asociaciones_contratadas::findOrFail($id);
        $asociacionesContratadas->delete();
        return back();
    }






}

