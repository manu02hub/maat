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
        $like = Likes::all();

        return Inertia::render('PrivateMaat/Likes/LikesIndex', compact('like'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Likes/LikesCreate');
    }

    public function store(Request $request)
    {
        $like = new Likes();
        $like->user_id = $request->user_id;
        $like->post_id = $request->post_id;
        $like->isLiked = $request->isLiked;

        $like->save();

        return Redirect::route('indexLikes');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $like = Likes::findOrFail($id);
        return Inertia::render('PrivateMaat/Likes/LikesEdit', compact('like'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $like = Likes::findOrFail($id);

        $like->update([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'isLiked' => $request->isLiked,
        ]);

        return Redirect::route('indexLikes');
    }

    //DELETE
    public function destroy($id)
    { 
        $like = Likes::findOrFail($id);
        $like->delete();
        return back();
    }
}
