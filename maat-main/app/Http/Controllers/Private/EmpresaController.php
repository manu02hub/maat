<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class EmpresaController extends Controller
{
    //INDEX
    public function index()
    {
        $empresa = Empresa::all();

        return Inertia::render('PrivateMaat/Empresa/EmpresaIndex', compact('empresa'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Empresa/EmpresaCreate');
    }

    public function store(Request $request)
    {
        $empresa = new Empresa();
        $empresa->entidad_id = $request->entidad_id;
        $empresa->save();

        return Redirect::route('indexEmpresa');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        return Inertia::render('PrivateMaat/Empresa/EmpresaEdit', compact('Empresa'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $empresa = Empresa::findOrFail($id);

        $empresa->update([
            'entidad_id' => $request->entidad_id,
        ]);

        return Redirect::route('indexEmpresa');
    }

    //DELETE
    public function destroy($id)
    { 
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return back();
    }
}
