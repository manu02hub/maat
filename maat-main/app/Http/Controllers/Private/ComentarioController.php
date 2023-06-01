<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ComentarioController extends Controller
{
     //INDEX
     public function index()
     {
         $comentario = Comentario::all();
 
         return Inertia::render('PrivateMaat/Comentario/ComentarioIndex', compact('comentario'));
     }
 
     //CREATE AND STORE
     public function create()
     {
         return Inertia::render('PrivateMaat/Comentario/ComentarioCreate');
     }
 
     public function store(Request $request)
     {
         $comentario = new Comentario();
         $comentario->descripcion = $request->descripcion;
         $comentario->user_id = $request->user_id;
         $comentario->post_id = $request->post_id;
         $comentario->like = $request->like;
         $comentario->save();
 
         return Redirect::route('indexComentario');
     }
 
     //EDIT AND UPDATE
 
     public function edit($id)
     {
         $comentario = Comentario::findOrFail($id);
         return Inertia::render('PrivateMaat/Comentario/ComentarioEdit', compact('comentario'));
     }
 
     public function update(Request $request)
     {
         $id = $request->id;
         $comentario = Comentario::findOrFail($id);
 
         $comentario->update([
             'descripcion' => $request->descripcion,
             'user_id' => $request->user_id,
             'post_id' => $request->post_id,
             'like' => $request->like,
         ]);
 
         return Redirect::route('indexComentario');
     }
 
     //DELETE
     public function destroy($id)
     {
         $comentario = Comentario::findOrFail($id);
         $comentario->delete();
         return back();
     }
 }