<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matchs;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class MatchsController extends Controller
{
    public function index()
    {
        $match = Matchs::all();

        return Inertia::render('PrivateMaat/Matchs/MatchsIndex', compact('match'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Matchs/MatchsCreate');
    }

    public function store(Request $request)
    {
        $match = new Matchs();
        $match->post_empresa_id = $request->post_empresa_id;
        $match->organizacion_id = $request->organizacion_id;

        $match->save();

        return Redirect::route('indexMatchs');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $match = Matchs::findOrFail($id);
        return Inertia::render('PrivateMaat/Matchs/MatchsEdit', compact('match'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $match = Matchs::findOrFail($id);

        $match->update([
            'post_empresa_id' => $request->post_empresa_id,
            'organizacion_id' => $request->organizacion_id,
        ]);

        return Redirect::route('indexMatchs');
    }

    //DELETE
    public function destroy($id)
    { 
        $match = Matchs::findOrFail($id);
        $match->delete();
        return back();
    }
}
