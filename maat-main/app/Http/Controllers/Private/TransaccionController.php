<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaccion;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaccion = Transaccion::all();
        // dd($transaccion);
        return Inertia::render('PrivateMaat/Transacciones/TransaccionesIndex', compact('transaccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('PrivateMaat/Transacciones/TransaccionesCreate');
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
            'titular' => 'required|string|max:255',
            'concepto' => 'required|string|max:255',
            'fecha' => 'required|date|max:255',
            'hora' => 'required|string|max:255',
            'cantidad' => 'required|int|max:11',
            'entidad_id' => 'required|int|max:11',
        ]);

        // dd($request);

        $transaccion = Transaccion::create([
            'titular' => $request->titular,
            'concepto' => $request->concepto,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'cantidad' => $request->cantidad,
            'entidad_id' => $request->entidad_id,
        ]);

        // $migration->save();

        return Redirect::route('indexTransacciones');
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
        $transaccion = Transaccion::find($id);
        return Inertia::render('PrivateMaat/Transacciones/TransaccionesEdit', [
            'transaccion' => $transaccion,
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
        Transaccion::find($id)->update([
            'titular' => $request->titular,
            'concepto' => $request->concepto,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'cantidad' => $request->cantidad,
            'entidad_id' => $request->entidad_id,
        ]);

        return Redirect::route('indexTransacciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $transaccion = Transaccion::find($id);

        $transaccion->delete();

        return Redirect::route('indexTransacciones');
    }

}
