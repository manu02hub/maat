<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Post;
use App\Models\Comentario;
use Inertia\Inertia;


class PostController extends Controller
{
    public function indexPost(Request $request){
        $post = Post::all();
        //   dd($post);
        $user = Users::all();
        // dd($user);
        $comentario = Comentario::all();
        // dd($comentario);

        return Inertia::render('private/Jorge/Post', compact('post','user','comentario'));
    }}
