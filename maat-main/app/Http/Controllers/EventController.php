<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Models\Users;
use App\Models\plan_contratado;
use App\Models\asociaciones_contratadas;
use App\Models\Empresa;
use App\Models\Entidad;
use App\Models\img_eventos;
use App\Models\Organizaciones;
use App\Models\user_has_evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $eventos = Eventos::all();
        return Inertia::render('private/Manu/MenuEventsONG', compact('eventos'));
    }

    public function create()
    {
        return Inertia::render('private/Manu/CreateEvents');
    }

    public function store(Request $request)
    {
        $reglas = [
            // 'nombreEvento' => 'required|string|max:255',
            // 'descripcion' => 'required|string',
            // 'fecha' => 'required',
            // 'horaInicio' => 'required|date_format:H:i',
            // 'horaFinal' => 'required|date_format:H:i',
            // 'plazas' => 'required|integer|min:1',
        ];

        $validatedData = $request->validate($reglas);
        $eventData = new Eventos();
        $eventData->nombre = $validatedData['nombreEvento'];
        $eventData->descripcion = $validatedData['descripcion'];
        $eventData->fecha_inicio = $validatedData['fecha'];
        $eventData->fecha_final = $validatedData['fecha'];
        $eventData->hora_inicio = $validatedData['horaInicio'];
        $eventData->hora_final = $validatedData['horaFinal'];
        $eventData->plazas = $validatedData['plazas'];
        /**
         * Revisar la organizacion que este registrada
         */
        $eventData->organizacion_id = 1;
        /**------------------------------------------ */
        $eventData->save();

        return Redirect::route('eventsIndex');
    }

    public function destroy($id)
    {
        $evento = Eventos::findOrFail($id);
        $evento->delete();
        return back();
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
        // dd($evento);
        $evento->update([
            'nombre' => $request->nombreEvento,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha,
            'fecha_final' => $request->fecha,
            'hora_inicio' => $request->horaInicio,
            'hora_final' => $request->horaFinal,
            'plazas' => $request->plazas,
            'organizacion' => 1
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
        // dd($empresa);
        $empresa_id = $empresa->id;
        $plan_contratado = plan_contratado::where('empresa_id', $empresa_id)->first();
        $plan_contratado_id = $plan_contratado->id;
        $asociaciones_contratadas = asociaciones_contratadas::where('plan_contratado_id', $plan_contratado_id)->pluck('organizacion_id');
        $eventos = Eventos::whereIn('organizacion_id', $asociaciones_contratadas)->whereNotIn('id', function ($query) {
            $query->select('evento_id')
                ->from('user_has_evento')
                ->where('user_id', auth()->id());
        })
            ->get();

        return Inertia::render('private/Manu/AllEventsToUser', compact('eventos'));
    }

    public function indexOwnUserEvents()
    {
        $eventos = Eventos::join('user_has_evento', 'evento.id', '=', 'user_has_evento.evento_id')
            ->where('user_has_evento.user_id', auth()->id())
            ->get();
        //  dd(auth()->id());
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
        $datosOrganizacionEvento = Entidad::find($datosEvento->organizacion_id);
        $eventosDeMismaOrganizacion = Eventos::where('organizacion_id', '=', $datosEvento->organizacion_id)
            ->where('id', '<>', $id)
            ->get();

        $estaInscrito = user_has_evento::where('evento_id', $id)->exists();
        return Inertia::render('private/Manu/EventInfo', compact('datosEvento', 'datosOrganizacionEvento', 'eventosDeMismaOrganizacion', 'estaInscrito'));
    }
}
