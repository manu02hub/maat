<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class RankingController extends Controller
{

    public function ranking(Request $request)
    {
        $request = DB::table('users')
            ->join('user_has_evento', 'users.id', '=', 'user_has_evento.user_id')
            ->join('entidad', 'users.entidad_id', '=', 'entidad.id')
            ->select(DB::raw('COUNT(DISTINCT users.id) AS num_usuarios, entidad.nombre, entidad.id'))
            ->groupBy('entidad.nombre', 'entidad.id')
            ->orderBy('num_usuarios', 'DESC')
            ->get();
            // dd($request);

            return Inertia::render('public/Ranking', ['user' => $request]);
            

    }
}
