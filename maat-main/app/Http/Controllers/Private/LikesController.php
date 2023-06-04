<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Likes;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class LikesController extends Controller
{
    public function index()
    {
        $likes = Likes::all();

        return Inertia::render('PrivateMaat/Likes/LikesIndex', compact('likes'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Likes/LikesCreate');
    }

    public function store(Request $request)
    {
        $likes = new Likes();
        $likes->ruta = $request->ruta;
        $likes->post_id = $request->post_id;
        $likes->save();

        return Redirect::route('indexLikes');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $likes = Likes::findOrFail($id);
        return Inertia::render('PrivateMaat/Likes/LikesEdit', compact('likes'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $likes = Likes::findOrFail($id);

        $likes->update([
            'ruta' => $request->ruta,
            'post_id' => $request->post_id,
        ]);

        return Redirect::route('indexLikes');
    }

    //DELETE
    public function destroy($id)
    { 
        $likes = Likes::findOrFail($id);
        $likes->delete();
        return back();
    }
}
