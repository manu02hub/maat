<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_has_evento;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class UserHasEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userHasEvento = user_has_evento::all();
        // dd($userHasEvento);
        return Inertia::render('PrivateMaat/userHasEvento/userHasEventoIndex', compact('userHasEvento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('PrivateMaat/userHasEvento/userHasEventoCreate');
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
            'user_id' => 'required|int|max:11',
            'evento_id' => 'required|int|max:11',
        ]);

        // dd($request);

        $userHasEvento = user_has_evento::create([
            'user_id' => $request->user_id,
            'evento_id' => $request->evento_id,
        ]);

        // $migration->save();

        return Redirect::route('indexuserHasEvento');
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
        $userHasEvento = user_has_evento::find($id);
        return Inertia::render('PrivateMaat/userHasEvento/userHasEventoEdit', [
            'userHasEvento' => $userHasEvento,
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
        user_has_evento::find($id)->update([
            'user_id' => $request->user_id,
            'evento_id' => $request->evento_id,
        ]);

        return Redirect::route('indexuserHasEvento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $userHasEvento = user_has_evento::find($id);

        $userHasEvento->delete();

        return Redirect::route('indexuserHasEvento');
    }

}
