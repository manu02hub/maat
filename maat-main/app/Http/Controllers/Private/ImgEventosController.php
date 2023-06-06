<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Img_eventos;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ImgEventosController extends Controller
{
    public function index()
    {
        $img_evento = Img_eventos::all();

        return Inertia::render('PrivateMaat/Img_eventos/Img_eventosIndex', compact('img_evento'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Img_eventos/Img_eventosCreate');
    }

    public function store(Request $request)
    {
        $img_evento = new Img_eventos();
        $img_evento->ruta = $request->ruta;
        $img_evento->evento_id = $request->evento_id;
        $img_evento->save();

        return Redirect::route('indexImg_eventos');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $img_evento = Img_eventos::findOrFail($id);
        // dd($img_evento);
        return Inertia::render('PrivateMaat/Img_eventos/Img_eventosEdit', compact('img_evento'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $img_evento = Img_eventos::findOrFail($id);

        $img_evento->update([
            'ruta' => $request->ruta,
            'evento_id' => $request->evento_id,
        ]);

        return Redirect::route('indexImg_eventos');
    }

    //DELETE
    public function destroy($id)
    { 
        $img_evento = Img_eventos::findOrFail($id);
        $img_evento->delete();
        return back();
    }
}

