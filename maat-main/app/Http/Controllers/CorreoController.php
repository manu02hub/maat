<?php

namespace App\Http\Controllers;

use App\Mail\CorreoRecivido;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CorreoController extends Controller
{

    public function send(Request $request)
    {
        $contenido = $request->validate([
            'empresa' => 'required',
            'correo' => 'required',
            'mensaje' => 'required',
        ]);

        Mail::to('mariogonzalezsolas@gmail.com')->send(new CorreoRecivido($contenido));

    }

}


?>