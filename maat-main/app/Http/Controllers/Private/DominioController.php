<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dominio;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class DominioController extends Controller
{
    //INDEX
    public function index()
    {
        $dominio = Dominio::all();

        return Inertia::render('PrivateMaat/Dominio/DominioIndex', compact('dominio'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Dominio/DominioCreate');
    }

    public function store(Request $request)
    {
        $dominio = new Dominio();
        $dominio->nombre = $request->nombre;
        $dominio->entidad_id = $request->entidad_id;
        $dominio->save();

        return Redirect::route('indexDominio');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $dominio = Dominio::findOrFail($id);
        return Inertia::render('PrivateMaat/Dominio/DominioEdit', compact('dominio'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $dominio = Dominio::findOrFail($id);

        $dominio->update([
            'nombre' => $request->nombre,
            'entidad_id' => $request->entidad_id,
        ]);

        return Redirect::route('indexDominio');
    }

    //DELETE
    public function destroy($id)
    {
        $dominio = Dominio::findOrFail($id);
        $dominio->delete();
        return back();
    }
}
