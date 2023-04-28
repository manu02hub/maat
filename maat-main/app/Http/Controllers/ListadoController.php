<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ListadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListado(Request $request)
    {
        // Guarda en $ong todas la organizacion de tipo ong que cumpla con el requisito
        $ong = DB::select('select * from maat.organizacion
        inner join maat.entidad on organizacion.entidad_id = entidad.id
        where entidad.id = ?', [$request->id]);

        // Guarda en $empr todas la organizacion de tipo empresa que cumpla con el requisito
        $empr = DB::select('select * from maat.empresa
        inner join maat.entidad on empresa.entidad_id = entidad.id
        where entidad.id = ?', [$request->id]);

        // Es ONG por lo que va a mostrar las organizaciones de tipo empresa
        if (count($ong) == 1) {
            $ong  = DB::select('select * from maat.empresa
            inner join maat.entidad on empresa.entidad_id = entidad.id');

            // Envía los resultados obtenidos
            return $ong;
            // Es empresa por lo que va a mostrar las organizaciones de tipo ONG
        } else if (count($empr) == 1) {
            $empr = DB::select('select * from maat.organizacion
            inner join maat.entidad on organizacion.entidad_id = entidad.id');

            // Envía los resultados obtenidos
            return $empr;
        } else {
            // Te devuelve al listado (acceso desde el metodo en url)
            return Inertia::render('private/Alex/ListadoCliente');
        }
    }

    public function getListadoOngRecientes()
    {
        // Guarda en $orgs todas las organizaciones de tipo ong
        $orgs = DB::select('select * from maat.organizacion
        inner join maat.entidad on organizacion.entidad_id = entidad.id');

        // Insertar dato
        // $insertar = DB::insert('insert into prueba (name) values (?)', [$request->prueba]);

        // Actualizar dato
        // $update = DB::update("update prueba set name = ? where idprueba = ?", [$request->prueba, 1]);
        // $update = DB::update("update prueba set name = 'asd' where idprueba = ?", [$request->prueba]);

        // Envía los resultados obtenidos
        return $orgs;
    }

    public function getPerfilP($id)
    {
        // Mira si existe la entidad a llamar
        $orgs = DB::select('select * from maat.entidad where entidad.id = ?', [$id]);

        // Guarda en $orgData los datos de la organizacion de manera ascendente
        // (administradores > empleados)
        $orgData = DB::select('select users.nombre as empleado, users.email, users.rol_id, entidad.id as org,
        entidad.nombre, entidad.logo, entidad.ubicacion, entidad.web, entidad.descripcion, entidad.tamano,
        entidad.numero_tarjeta
        from maat.entidad
        inner join maat.users on users.entidad_id = entidad.id
        where entidad.id = ?
        order by users.rol_id asc', [$id]);

        // Mira si es una ONG o no
        $ong = DB::select('select * from maat.entidad
        inner join maat.organizacion on entidad.id = organizacion.entidad_id
        where entidad.id = ?', [$id]);

        // Envía los resultados obtenidos
        if (count($orgs) == 1 && count($orgData) != 0) {
            return Inertia::render('private/Alex/PerfilPublic', ['datos' => $orgData, 'isOng' => count($ong)]);
        } else {
            return Inertia::render('private/Alex/ListadoCliente');
        }
    }

    // Redirecciona si la id a acceder es numerica
    public function getIdReceptor($id)
    {
        // Dependiendo de si el numero es numerico o no, te lleva a una vista u otra
        if (is_numeric($id)) {
            return Inertia::render('private/Alex/Chat', ['chatWith' => $id]);
        } else {
            return Inertia::render('private/Alex/ListadoCliente');
        }
    }

    public function getChatById(Request $request)
    {
        // Guarda en $ong todas la organizacion de tipo ong que cumpla con el requisito
        $ong = DB::select('select * from maat.organizacion
                inner join maat.entidad on organizacion.entidad_id = entidad.id
                where entidad.id = ?', [$request->params['userId']]);

        // Guarda en $empr todas la organizacion de tipo empresa que cumpla con el requisito
        $empr = DB::select('select * from maat.empresa
                inner join maat.entidad on empresa.entidad_id = entidad.id
                where entidad.id = ?', [$request->params['userId']]);

        // Es ONG el usuario, por lo que va a mostrar los chats de empresa
        if (count($ong) == 1 && $request->params['id'] != $request->params['userId']) {
            // Guarda en $chatEmpresa todas las entidades empresas
            $chatEmpresa = DB::select('select * from maat.entidad
                    inner join maat.empresa on empresa.entidad_id = entidad.id');

            // Mira con quien está chateando
            $chatWith = DB::select(
                'select * from maat.chat
                    where chat.organizacion_id = ? and chat.empresa_id = ?',
                [$request->params['userId'], $request->params['id']]
            );

            // Mira si existe el chat con el usuario seleccionado
            if (count($chatWith) == 0) {
                // Si no existe, entonces crea uno
                $chatId = DB::table('maat.chat')->insertGetId([
                    'empresa_id' => $request->params['id'],
                    'organizacion_id' => $request->params['userId']
                ]);

                $chat = DB::table('maat.mensaje')->insert([
                    'contenido' => 'Has iniciado un chat',
                    'fecha' => now()->year . "-" . now()->month . "-" . now()->day,
                    'hora' => now()->hour . ":" . now()->minute . ":" . now()->second,
                    'chat_id' => $chatId,
                    'id_origen' => $request->params['id'],
                    'id_destino' => $request->params['userId'],
                ]);

                $chatWith = DB::select(
                    'select mensaje.id_origen, mensaje.id_destino, mensaje.contenido,
                        mensaje.fecha, mensaje.hora, entidad.nombre from maat.chat
                        inner join maat.mensaje on mensaje.chat_id = chat.id
                        inner join maat.entidad on entidad.id = chat.organizacion_id
                        where chat.organizacion_id = ? and chat.empresa_id = ?',
                    [$request->params['userId'], $request->params['id']]
                );

                // Mira todos los chats existentes.
                return ['chats' => $chatEmpresa, 'chatWith' => $chatWith];
            } else if (count($chatWith) > 0) {
                // Si existe, entonces abre el historial de chat con el usuario
                $chatWith = DB::select(
                    'select mensaje.id_origen, mensaje.id_destino, mensaje.contenido,
                        mensaje.fecha, mensaje.hora, entidad.nombre from maat.chat
                        inner join maat.mensaje on mensaje.chat_id = chat.id
                        inner join maat.entidad on entidad.id = chat.organizacion_id
                        where chat.organizacion_id = ? and chat.empresa_id = ?',
                    [$request->params['userId'], $request->params['id']]
                );

                // Mira todos los chats existentes.
                return ['chats' => $chatEmpresa, 'chatWith' => [$chatWith]];
            }

            // Es empresa el usuario, por lo que va a mostrar los chats de ONG
        } else if (count($empr) == 1 && $request->params['id'] != $request->params['userId']) {
            // Guarda en $chatOngs todas las entidades ONGs
            $chatOngs = DB::select('select * from maat.entidad
                    inner join maat.organizacion on organizacion.entidad_id = entidad.id');

            // Mira con quien está chateando
            $chatWith = DB::select(
                'select * from maat.chat
                    where chat.organizacion_id = ? and chat.empresa_id = ?',
                [$request->params['id'], $request->params['userId']]
            );

            // Mira si existe el chat con el usuario
            if (count($chatWith) == 0) {
                // Si no existe, entonces crea uno
                $chatId = DB::table('maat.chat')->insertGetId([
                    'empresa_id' => $request->params['userId'],
                    'organizacion_id' => $request->params['id']
                ]);

                $chat = DB::table('maat.mensaje')->insert([
                    'contenido' => 'Has iniciado un chat',
                    'fecha' => now()->year . "-" . now()->month . "-" . now()->day,
                    'hora' => now()->hour . ":" . now()->minute . ":" . now()->second,
                    'chat_id' => $chatId,
                    'id_origen' => $request->params['userId'],
                    'id_destino' => $request->params['id'],
                ]);

                $chatWith = DB::select(
                    'select mensaje.id_origen, mensaje.id_destino, mensaje.contenido,
                        mensaje.fecha, mensaje.hora, entidad.nombre from maat.chat
                        inner join maat.mensaje on mensaje.chat_id = chat.id
                        inner join maat.entidad on entidad.id = chat.organizacion_id
                        where chat.organizacion_id = ? and chat.empresa_id = ?',
                    [$request->params['id'], $request->params['userId']]
                );

                // Mira todos los chats existentes.
                return ['chats' => $chatOngs, 'chatWith' => $chatWith];
            } else if (count($chatWith) > 0) {
                // Si existe, entonces abre el historial de chat con el usuario
                $chatWith = DB::select(
                    'select mensaje.id_origen, mensaje.id_destino, mensaje.contenido,
                        mensaje.fecha, mensaje.hora, entidad.nombre from maat.chat
                        inner join maat.mensaje on mensaje.chat_id = chat.id
                        inner join maat.entidad on entidad.id = chat.organizacion_id
                        where chat.organizacion_id = ? and chat.empresa_id = ?',
                    [$request->params['id'], $request->params['userId']]
                );;

                // Mira todos los chats existentes.
                return ['chats' => $chatOngs, 'chatWith' => [$chatWith]];
            }
        }
    }

    // Coge todos los chats dependiendo del usuario
    public function getAllChats(Request $request)
    {
        try {
            // Guarda en $ong todas la organizacion de tipo ong que cumpla con el requisito
            $ong = DB::select('select * from maat.organizacion
            inner join maat.entidad on organizacion.entidad_id = entidad.id
            where entidad.id = ?', [$request->authId]);

            // Guarda en $empr todas la organizacion de tipo empresa que cumpla con el requisito
            $empr = DB::select('select * from maat.empresa
            inner join maat.entidad on empresa.entidad_id = entidad.id
            where entidad.id = ?', [$request->authId]);
        } catch (Exception $e) {
            echo $e;
        }

        // Es ONG el usuario, por lo que va a mostrar los chats de empresa
        if (count($ong) == 1) {
            // Verifica que son distintas entidades (usuario y el del chat escogido)
            $checkType = DB::select('select * from maat.chat
            inner join maat.mensaje on mensaje.chat_id = chat.id
            where chat');

            return $ong;
            // Es empresa el usuario, por lo que va a mostrar los chats de ONG
        } else if (count($empr) == 1) {
            // Muestra todos los chats ONG
            $recent = DB::select('select * from maat.chat
            inner join maat.mensaje on mensaje.chat_id = chat.id
            inner join maat.organizacion on organizacion.entidad_id = chat.organizacion_id
            where chat.empresa_id = ?', [$request->authId]);
        }

        // Mira todos los chats existentes.
        return Inertia::render('private/Alex/Chat', ['id' => $request->authId]);
    }

    // Método para enviar mensajes de chat
    public function sendChat(Request $request)
    {
        // Mira si el usuario es de una organizacion
        $ong = DB::select('select * from maat.organizacion
        inner join maat.entidad on organizacion.entidad_id = entidad.id
        where entidad.id = ?', [$request->idOrigen]);

        // Mira si el usuario es de una empresa
        $empr = DB::select('select * from maat.empresa
        inner join maat.entidad on empresa.entidad_id = entidad.id
        where entidad.id = ?', [$request->idOrigen]);

        // Dependiendo del contador entonces significa que es un tipo de usuario (ONG o empresa)
        // Es ONG el usuario, por lo que va enviar de ong a empresa
        if (count($ong) == 1) {
            // Coge el id del chat del usuario
            $chatId = DB::select(
                'select * from maat.chat where chat.organizacion_id = ? and chat.empresa_id = ?',
                [$request->idOrigen, $request->idDestino]
            );

            $chat = DB::table('maat.mensaje')->insert([
                'contenido' => $request->msg,
                'fecha' => $request->fecha,
                'hora' => $request->hora,
                'chat_id' => $chatId[0]->id,
                'id_origen' => $request->idOrigen,
                'id_destino' => $request->idDestino,
            ]);

            // Es empresa el usuario, por lo que va a mostrar los chats de ONG
        } else if (count($empr) == 1) {
            // Coge el id del chat del usuario
            $chatId = DB::select(
                'select id from maat.chat where chat.organizacion_id = ? and chat.empresa_id = ?',
                [$request->idDestino, $request->idOrigen]
            );

            // Envia el mensaje a la base de datos
            $chat = DB::table('maat.mensaje')->insert([
                'contenido' => $request->msg,
                'fecha' => $request->fecha,
                'hora' => $request->hora,
                'chat_id' => $chatId[0]->id,
                'id_origen' => $request->idOrigen,
                'id_destino' => $request->idDestino,
            ]);
        } else {
            return Inertia::render('private/Alex/ListadoCliente');
        }
    }
}
