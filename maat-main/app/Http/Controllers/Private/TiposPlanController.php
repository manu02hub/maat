<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tipos_plan;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class TiposPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposPlan = tipos_plan::all();
        // dd($tiposPlan);
        return Inertia::render('PrivateMaat/tiposPlan/tiposPlanIndex', compact('tiposPlan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('PrivateMaat/tiposPlan/tiposPlanCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|int|max:255',
            'num_max_asociaciones' => 'required|int|max:11',
            'duracion' => 'required|string|max:255',
        ]);

        // dd($request);

        $tiposPlan = tipos_plan::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'num_max_asociaciones' => $request->num_max_asociaciones,
            'duracion' => $request->duracion,
        ]);

        // $migration->save();

        return Redirect::route('indexTiposPlan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $tiposPlan = tipos_plan::find($id);
        return Inertia::render('PrivateMaat/tiposPlan/tiposPlanEdit', [
            'tiposPlan' => $tiposPlan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // dd($request, $id);
        tipos_plan::find($id)->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'num_max_asociaciones' => $request->num_max_asociaciones,
            'duracion' => $request->duracion,
        ]);

        return Redirect::route('indexTiposPlan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $tiposPlan = tipos_plan::find($id);

        $tiposPlan->delete();

        return Redirect::route('indexTiposPlan');
    }

}
