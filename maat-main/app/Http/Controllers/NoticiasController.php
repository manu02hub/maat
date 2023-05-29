<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticias;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticia = Noticias::all();
        // dd($noticia);
        return Inertia::render('public/Noticias', compact('noticia'));
    }

    public function noticiaslistado()
    {
        $noticia = Noticias::all();
        // dd($noticia);
        return Inertia::render('private/Carlos/NoticiasListado', compact('noticia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('private/Carlos/CrearNoticia');
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
            'titulo' => 'required|string|max:255',
            'fecha' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'imagen' => 'required|string|max:255',
        ]);

        // dd($request);

        $noticia = Noticias::create([
            'titulo' => $request->titulo,
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen
        ]);

        // $noticia->save();

        return Redirect::route('noticias-listado');
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
        $noticia = Noticias::find($id);
        // dd($curso);
        // return Inertia::render('private/Carlos/EditNoticia', compact('noticia'));
        return Inertia::render('private/Carlos/EditNoticia', [
            'noticia' => $noticia,
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
        Noticias::find($id)->update([
            'titulo' => $request->titulo,
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
        ]);

        return Redirect::route('noticias-listado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $noticia = Noticias::find($id);

        $noticia->delete();

        return Redirect::route('noticias-listado');
    }
}
