<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class PerfilController extends Controller
{
    public function indexPerfil(Request $request){
        $user = Users::where("id",auth()->id())->first();
        return Inertia::render('private/Piero/PerfilUsuario', compact('user'));
    }

    public function editPerfil($id){

    }

    public function updatePerfil(Request $request){

    }
}
