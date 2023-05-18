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
    public function indexPost(Request $request){
        $post = Post::all();
        //   dd($post);
        $user = Users::all();
        // dd($user);
        $comentario = Comentario::all();
        // dd($comentario);
        $like = Likes::all();
        // dd($likes);

        return Inertia::render('private/Jorge/Post', compact('post','user','comentario','like'));
    }

    public function createComentario(Request $request, $post_id){
         // dd($request);
         $user = Users::where("id",auth()->id())->first();
        //  dd($user->id);
         $comentario = new Comentario();
         $comentario-> descripcion = $request->descripcion;
         $comentario-> user_id =  $user->id;
         $comentario-> post_id = $post_id;
         $comentario->save();
         return back();
        }


    public function destroyComentario($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();
        return back();
    }

    
    public function addLike(Request $request, $post_id){
        // dd($request);
        $user = Users::where("id",auth()->id())->first();
       //  dd($user->id);
        $likes = new Likes();
        $likes-> user_id =  $user->id;
        $likes-> post_id = $post_id;
        $likes-> isLiked = true;
        $likes->save();
        return back();
   }



}
