<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function getListado(Request $request)
    {
        return Inertia::render('private/Alex/ListadoCliente');
    }
}
