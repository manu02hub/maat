<?php

namespace App\Http\Controllers;

use App\Rules\NoPalabraLarga;
use Illuminate\Support\Facades\DB;
use App\Models\Eventos;
use App\Models\Users;
use App\Models\plan_contratado;
use App\Models\asociaciones_contratadas;
use App\Models\Empresa;
use App\Models\Post;
use App\Models\Likes;
use App\Models\Entidad;
use App\Models\Comentario;
use App\Models\img_eventos;
use App\Models\Organizaciones;
use App\Models\user_has_evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EventController extends Controller

{
    public function index()
    {
        $organizacion_id = Organizaciones::where('entidad_id', auth()->user()->entidad_id)->first();
        $eventos = Eventos::where('organizacion_id', $organizacion_id->id)->get();
        $showDeleteModal = session('showDeleteModal', false);
        return Inertia::render('private/Manu/MenuEventsONG', compact('eventos', 'showDeleteModal'));
    }


    public function create()
    {
        return Inertia::render('private/Manu/CreateEvents');
    }

    public function store(Request $request)
    {
        $reglas = [
            'nombreEvento' => 'required|string|max:50',
            'descripcion' => ['required', 'string', 'min:200', 'max:250', new NoPalabraLarga],
            'fecha' => 'required|date|after_or_equal:today',
            'horaInicio' => 'required|date_format:H:i',
            'horaFinal' => 'required|date_format:H:i',
            'plazas' => 'required|integer|min:1|max:20',
        ];

        $mensajes = [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser un texto.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'max' => 'El campo :attribute no puede exceder los :max caracteres.',
            'date_format' => 'El campo :attribute debe tener el formato H:i.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'fecha.after_or_equal' => 'La fecha debe ser igual o posterior a hoy.',

        ];

        $organizacion_id_entidad = Organizaciones::where('entidad_id', auth()->user()->entidad_id)->first();
        $validatedData = $request->validate($reglas, $mensajes);
        $eventData = new Eventos();
        $eventData->nombre = $validatedData['nombreEvento'];
        $eventData->descripcion = $validatedData['descripcion'];
        $eventData->fecha_inicio = $validatedData['fecha'];
        $eventData->fecha_final = $validatedData['fecha'];
        $eventData->hora_inicio = $validatedData['horaInicio'];
        $eventData->hora_final = $validatedData['horaFinal'];
        $eventData->plazas = $validatedData['plazas'];
        $eventData->organizacion_id =  $organizacion_id_entidad->id;
        $eventData->save();

        return Redirect::route('eventsIndex');
    }

    public function destroy($id)
    {
        $evento = Eventos::findOrFail($id);
        $esEventoConUsuarios = user_has_evento::where('evento_id', $id)->exists();
        if ($esEventoConUsuarios) {
            return redirect()->back()->with([
                'showDeleteModal' => true
            ]);
        } else {
            $evento->delete();
            return back();
        }
    }





    public function edit($id)
    {
        $evento = Eventos::findOrFail($id);
        return Inertia::render('private/Manu/EditEvents', compact('evento'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $evento = Eventos::findOrFail($id);
        $organizacion_id_entidad = Organizaciones::where('entidad_id', auth()->user()->entidad_id)->first();

        $reglas = [
            'nombreEvento' => 'required|string|max:50',
            'descripcion' => ['required', 'string', 'min:200', 'max:250', 'palabra_larga_menor_de_quince_caracteres'],
            'fecha' => 'required|date|after_or_equal:today',
            'horaInicio' => 'required|date_format:H:i',
            'horaFinal' => 'required|date_format:H:i',
            'plazas' => 'required|integer|min:1|max:20',
        ];

        $mensajes = [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser un texto.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'max' => 'El campo :attribute no puede exceder los :max caracteres.',
            'date_format' => 'El campo :attribute debe tener el formato H:i.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'fecha.after_or_equal' => 'La fecha debe ser igual o posterior a hoy.',
            'descripcion.palabra_larga_menor_de_quince_caracteres' => 'La descripción no puede contener palabras con más de 15 caracteres.',

        ];

        $validatedData = $request->validate($reglas, $mensajes);

        $evento->update([
            'nombre' => $validatedData['nombreEvento'],
            'descripcion' => $validatedData['descripcion'],
            'fecha_inicio' => $validatedData['fecha'],
            'fecha_final' => $validatedData['fecha'],
            'hora_inicio' => $validatedData['horaInicio'],
            'hora_final' => $validatedData['horaFinal'],
            'plazas' => $validatedData['plazas'],
            'organizacion_id' => $organizacion_id_entidad->id
        ]);

        return Redirect::route('eventsIndex');
    }

    public function indexEventUser()
    {
        $eventos = Eventos::all();
        // dd($eventos);
        return Inertia::render('private/Manu/OwnEvents', compact('eventos'));
    }


    //modificarlo para que salgan los eventos los cuales tienen la emrpesa del trabajador contratado
    public function indexAllEventUser()
    {
        $entidad_id = auth()->user()->entidad_id;
        $empresa = Empresa::where('entidad_id', $entidad_id)->first();
        $empresa_id = $empresa->id;
        $plan_contratado = plan_contratado::where('empresa_id', $empresa_id)->first();
        $eventos = [];

        if ($plan_contratado != null) {
            $plan_contratado_id = $plan_contratado->id;
            $asociaciones_contratadas = asociaciones_contratadas::where('plan_contratado_id', $plan_contratado_id)->pluck('organizacion_id');
            $eventos = Eventos::whereIn('organizacion_id', $asociaciones_contratadas)->whereNotIn('id', function ($query) {
                $query->select('evento_id')
                    ->from('user_has_evento')
                    ->where('user_id', auth()->id());
            })
                ->get();
        }

        return Inertia::render('private/Manu/AllEventsToUser', compact('eventos'));
    }

    public function indexOwnUserEvents()
    {
        $eventos = Eventos::join('user_has_evento', 'evento.id', '=', 'user_has_evento.evento_id')
            ->where('user_has_evento.user_id', auth()->id())
            ->get();
        return Inertia::render('private/Manu/OwnEvents', compact('eventos'));
    }

    public function apuntarseEvento(Request $request)
    {
        $id_evento = $request->id;
        $id_user = auth()->id();
        $user_has_evento = new user_has_evento();
        $user_has_evento->user_id = $id_user;
        $user_has_evento->evento_id = $id_evento;
        $user_has_evento->save();
        return back();
    }

    public function desapuntarseEvento(Request $request)
    {
        $id_evento = $request->id;
        $evento = user_has_evento::where('user_id', auth()->id())->where('evento_id', $id_evento);
        $evento->delete();
        return back();
    }

    public function eventInfo(Request $request, $id)
    {

        $datosEvento = Eventos::find($id);
        $organizaciones = Organizaciones::where('id', $datosEvento->organizacion_id)->first();
        $datosOrganizacionEvento = Entidad::find($organizaciones->entidad_id);
        $eventosDeMismaOrganizacion = Eventos::where('organizacion_id', '=', $datosEvento->organizacion_id)
            ->where('id', '<>', $id)
            ->get();
        $estaInscrito = user_has_evento::where('evento_id', $id)->exists();
        // dd($estaInscrito);
        $posts = Post::where('evento_id', $id)->get()->first();

        if ($posts != null) {
            $likes = Likes::where('post_id', $posts->id)
                ->where('isLiked', 1)
                ->distinct('user_id')
                ->count('user_id');

            $comentario = Comentario::where('post_id', $posts->id)->get();
            // dd($comentario);
            $validator = true;

            $user = Users::where("id", auth()->id())->first();
            $like = Likes::where('user_id', $user -> id)->get()->first();
            // dd($like);

            return Inertia::render('private/Manu/EventInfo', compact('datosEvento', 'datosOrganizacionEvento', 'eventosDeMismaOrganizacion', 'estaInscrito', 'posts', 'likes', 'comentario', 'validator', 'like'));
        } else {
            $validator = false;
        }
        return Inertia::render('private/Manu/EventInfo', compact('datosEvento', 'datosOrganizacionEvento', 'eventosDeMismaOrganizacion', 'estaInscrito', 'validator'));
    }


    //     public function createComentario(Request $request, $post_id){
    //         // dd($request);
    //         $user = Users::where("id",auth()->id())->first();
    //        //  dd($user->id);
    //         $comentario = new Comentario();
    //         $comentario-> descripcion = $request->descripcion;
    //         $comentario-> user_id =  $user->id;
    //         $comentario-> post_id = $post_id;
    //         $comentario->save();
    //         return Redirect::route('recogerPost');
    //    }
    //    public function destroyComentario($id)
    //    {
    //        $comentario = Comentario::findOrFail($id);
    //        $comentario->delete();
    //        return back();
    //    }
    //    public function addLike(Request $request, $post_id){
    //     // dd($request);
    //     $user = Users::where("id",auth()->id())->first();
    //    //  dd($user->id);
    //     $likes = new Likes();
    //     $likes-> user_id =  $user->id;
    //     $likes-> post_id = $post_id;
    //     $likes-> isLiked = true;
    //     $likes->save();
    //     return Redirect::route('recogerPost');
    // }
}
