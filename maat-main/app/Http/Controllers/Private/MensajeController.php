<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensaje;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class MensajeController extends Controller
{
    public function index()
    {
        $mensaje = Mensaje::all();

        return Inertia::render('PrivateMaat/Mensaje/MensajeIndex', compact('mensaje'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Mensaje/MensajeCreate');
    }

    public function store(Request $request)
    {
        $mensaje = new Mensaje();
        $mensaje->contenido = $request->contenido;
        $mensaje->fecha = $request->fecha;
        $mensaje->hora = $request->hora;
        $mensaje->chat_id = $request->chat_id;
        $mensaje->id_origen = $request->id_origen;
        $mensaje->id_destino = $request->id_destino;


        $mensaje->save();

        return Redirect::route('indexMensaje');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        return Inertia::render('PrivateMaat/Mensaje/MensajeEdit', compact('mensaje'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $mensaje = Mensaje::findOrFail($id);

        $mensaje->update([
            'contenido' => $request->contenido,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'chat_id' => $request->chat_id,
            'id_origen' => $request->id_origen,
            'id_destino' => $request->id_destino,    
        ]);

        return Redirect::route('indexMensaje');
    }

    //DELETE
    public function destroy($id)
    { 
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->delete();
        return back();
    }
}

