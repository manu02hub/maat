<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Img_post;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ImgPostController extends Controller
{
    public function index()
    {
        $img_post = Img_post::all();

        return Inertia::render('PrivateMaat/Img_post/Img_postIndex', compact('img_post'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Img_post/Img_postCreate');
    }

    public function store(Request $request)
    {
        $img_post = new Img_post();
        $img_post->ruta = $request->ruta;
        $img_post->post_id = $request->post_id;
        $img_post->save();

        return Redirect::route('indexImg_post');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $img_post = Img_post::findOrFail($id);
        return Inertia::render('PrivateMaat/Img_post/Img_postEdit', compact('img_post'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $img_post = Img_post::findOrFail($id);

        $img_post->update([
            'ruta' => $request->ruta,
            'post_id' => $request->post_id,
        ]);

        return Redirect::route('indexImg_post');
    }

    //DELETE
    public function destroy($id)
    { 
        $img_post = Img_post::findOrFail($id);
        $img_post->delete();
        return back();
    }
}

