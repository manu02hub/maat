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
use Illuminate\Support\Facades\DB;


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

        $result = DB::table('likes')
            ->select('users.id AS usuario', 'post.id AS post', 'likes.isLiked')
            ->join('users', 'likes.user_id', '=', 'users.id')
            ->join('post', 'likes.post_id', '=', 'post.id')
            ->where('likes.isLiked', true)
            ->get();

        $likePosts = DB::table('post')
            ->leftJoin('likes', function ($join) {
                $join->on('post.id', '=', 'likes.post_id')
                    ->where('likes.isLiked', true);
            })
            ->select('post.id AS post_id', 'post.titulo AS post', DB::raw('COUNT(likes.id) AS numero_likes'))
            ->groupBy('post.id', 'post.titulo')
            ->get();

        $comentariosPost = DB::table('post')
            ->leftJoin('comentario', 'post.id', '=', 'comentario.post_id')
            ->select('post.id AS post_id', 'post.titulo AS post', DB::raw('COUNT(comentario.id) AS numero_comentarios'))
            ->groupBy('post.id', 'post.titulo')
            ->get();
        // dd($comentariosPost);

        $register = Users::where("id", auth()->id())->first();

        // dd($register);

        $likeUser =  DB::table('post')
            ->leftJoin('likes', function ($join) use ($register) {
                $join->on('post.id', '=', 'likes.post_id')
                    ->where('likes.user_id', '=', $register->id)
                    ->where('likes.isLiked', '=', true);
            })
            ->select('post.id AS post_id', 'post.titulo AS post', DB::raw('IF(likes.user_id IS NULL, 0, 1) AS likeBool'))
            ->get();

        // dd($likeUser);
        // dd($result);
        // dd($likePosts);

        return Inertia::render('private/Jorge/Post', compact('post', 'user', 'comentario', 'like', 'result', 'likePosts', 'likeUser','comentariosPost'));
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
        // dd($user);
        // dd($likes);
        // dd($likes[$request->id - 1]->user_id);

        $existeLike = DB::table('likes')
            ->where('user_id', auth()->id())
            ->where('post_id', $post_id)
            ->exists();

        $idLike = DB::table('likes')
            ->where('user_id', auth()->id())
            ->where('post_id', $post_id)
            ->pluck('id')
            ->first();

        // dd($idLike);
        // dd($existeLike);


        if ($existeLike == true) {
            $id = $request->id;
            // dd($id);
            $likeFindId = Likes::findOrFail($idLike);
            // dd($likeFindId);
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
            $like = new Likes();
            $like->user_id =  $user->id;
            $like->post_id = $post_id;
            $like->isLiked = true;
            $like->save();
            return back();
        }
    }
}
