<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Post;
use App\Models\Likes;
use App\Models\Comentario;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;


class PostController extends Controller
{
    public function indexPost(Request $request)
    {
        $post = Post::all();
        $user = Users::all();
        $comentario = Comentario::all();
        $like = Likes::all();
        // dd($post);
        // dd($user);
        // dd($comentario);
        // dd($likes);



        return Inertia::render('private/Jorge/Post', compact('post', 'user', 'comentario', 'like'));
    }

    public function createComentario(Request $request, $post_id)
    {
        // dd($request);
        $user = Users::where("id", auth()->id())->first();
        //  dd($user->id);
        $comentario = new Comentario();
        $comentario->descripcion = $request->descripcion;
        $comentario->user_id =  $user->id;
        $comentario->post_id = $post_id;
        $comentario->save();
        return back();
    }


    public function destroyComentario($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();
        return back();
    }

    public function editLike(Request $request)
    {


        $id = $request->id;
        $like = Likes::findOrFail($id);

        $like->update([
            'contenido' => $request->contenido,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'chat_id' => $request->chat_id,
            'id_origen' => $request->id_origen,
            'id_destino' => $request->id_destino,
        ]);

        return back();
    }

    public function addLike(Request $request, $post_id)
    {

        // dd($id = $request->id);
        //  dd($user->id);
        // dd($likes[$request->id-1] -> user_id);
        $likes = Likes::all();
        $user = Users::where("id", auth()->id())->first();
        $like = new Likes();


        if ($likes[$request->id - 1]->user_id == $user->id) {
            $id = $request->id;
            $likeFindId = Likes::findOrFail($id);
            if ($likeFindId->isLiked == 0) {
                $likeFindId->update([
                    'isLiked' => 1,
                ]);
            } else {
                $likeFindId->update([
                    'isLiked' => 0,
                ]);
            }

            return back();
        } else {
            $like->user_id =  $user->id;
            $like->post_id = $post_id;
            $like->isLiked = true;
            $like->save();
            return back();
        }
    }
}
