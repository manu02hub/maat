<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Valoraciones;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ValoracionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $valoracion = Valoraciones::all();
        // dd($valoracion);
        return Inertia::render('PrivateMaat/Valoraciones/ValoracionIndex', compact('valoracion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('PrivateMaat/Valoraciones/ValoracionCreate');
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
            'comentario' => 'required|string|max:255',
            'estrellas' => 'required|int|max:11',
            'user_id' => 'required|int|max:11',
            'evento_id' => 'required|int|max:11',
        ]);

        // dd($request);

        $valoracion = Valoraciones::create([
            'comentario' => $request->comentario,
            'estrellas' => $request->estrellas,
            'user_id' => $request->user_id,
            'evento_id' => $request->evento_id,
        ]);

        // $migration->save();

        return Redirect::route('indexValoracion');
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
        $valoracion = Valoraciones::find($id);
        return Inertia::render('PrivateMaat/Valoraciones/ValoracionEdit', [
            'valoracion' => $valoracion,
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
        Valoraciones::find($id)->update([
            'comentario' => $request->comentario,
            'estrellas' => $request->estrellas,
            'user_id' => $request->user_id,
            'evento_id' => $request->evento_id,
        ]);

        return Redirect::route('indexValoracion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $valoracion = Valoraciones::find($id);

        $valoracion->delete();

        return Redirect::route('indexValoracion');
    }

}
