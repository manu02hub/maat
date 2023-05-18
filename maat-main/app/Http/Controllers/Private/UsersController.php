<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UsersController extends Controller
{
    public function indexUserPrivate(Request $request)
    {
        $user = Users::All();
        return Inertia::render('private/Sergio/UsuariosEmpresa/Listado', compact('user'));
    }
}
