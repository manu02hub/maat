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

    // Redirecciona si la id a acceder es un numero
    public function getIdReceptor($id)
    {
        try {
            // Dependiendo de si el numero es numerico o no, te lleva a una vista u otra
            if (is_numeric($id)) {
                return Inertia::render('private/Alex/Chat', ['chatWith' => $id]);
            } else {
                return Inertia::render('private/Alex/ListadoCliente');
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // Coge todos los chats dependiendo del usuario
    public function getAllChats(Request $request)
    {
        try {
            // Guarda en $ong todas la organizacion de tipo ong que cumpla con el requisito
            $ong = DB::select('select * from maat.organizacion
            inner join maat.entidad on organizacion.entidad_id = entidad.id
            where entidad.id = ?', [$request->params['userId']]);

            // Guarda en $empr todas la organizacion de tipo empresa que cumpla con el requisito
            $empr = DB::select('select * from maat.empresa
            inner join maat.entidad on empresa.entidad_id = entidad.id
            where entidad.id = ?', [$request->params['userId']]);

            // Es ONG el usuario, por lo que va a mostrar los chats de empresa
            if (count($ong) == 1) {
                // Guarda en $listChats todas las entidades empresas
                $listChats = DB::select('select * from maat.entidad
                inner join maat.empresa on empresa.entidad_id = entidad.id');

                // Recoge los chats recientes (o sea los que hayan tenido contacto con la empresa
                // anteriormente)
                $recentChats = DB::select(
                    'select entidad.nombre, c1.empresa_id as entidad, mensaje.contenido
                    from maat.chat as c1
                    inner join (
                        select mensaje.chat_id
                        from maat.mensaje
                        group by mensaje.chat_id
                        order by mensaje.chat_id desc
                        ) c2
                    on c1.id = c2.chat_id
                    inner join mensaje on c2.chat_id = mensaje.chat_id
                    inner join maat.entidad on entidad.id = c1.empresa_id
                    where organizacion_id = ? and mensaje.id in (
                        select max(mensaje.id)
                        from maat.mensaje
                        where c2.chat_id = mensaje.chat_id
                        )',
                    [$request->params['userId']]
                );


                // Es empresa el usuario, por lo que va a mostrar los chats de ONG
            } else if (count($empr) == 1) {
                // Guarda en $listChats todas las entidades ONGs
                $listChats = DB::select('select * from maat.entidad
                inner join maat.organizacion on organizacion.entidad_id = entidad.id');

                // Se ha usado el IN para poder coger los ultimos mensajes (valores concretos)
                // https://www.w3schools.com/mysql/mysql_in.asp
                // https://dev.mysql.com/doc/refman/8.0/en/non-typed-operators.html
                // Recoge los chats recientes (o sea los que hayan tenido contacto con la empresa
                // anteriormente)
                // Salia un error de clausula group by mayormente porque no puede agrupar diferentes
                // valores de una misma columna (en este caso el contenido del mensaje)
                $recentChats = DB::select(
                    'select entidad.nombre, c1.organizacion_id as entidad, mensaje.contenido
                    from maat.chat as c1
                    inner join (
                        select mensaje.chat_id
                        from maat.mensaje
                        group by mensaje.chat_id
                        order by mensaje.chat_id desc
                        ) c2
                    on c1.id = c2.chat_id
                    inner join mensaje on c2.chat_id = mensaje.chat_id
                    inner join maat.entidad on entidad.id = c1.organizacion_id
                    where empresa_id = ? and mensaje.id in (
                        select max(mensaje.id)
                        from maat.mensaje
                        where c2.chat_id = mensaje.chat_id
                        )',
                    [$request->params['userId']]
                );
            }

            // Mira todos los chats existentes.
            return ['chats' => $listChats, 'recentChats' => $recentChats];
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // Sirve para tanto coger el chat al iniciar por id
    public function getChatById(Request $request)
    {
        try {
            // Guarda en $ong todas la organizacion de tipo ong que cumpla con el requisito
            $ong = DB::select('select * from maat.organizacion
                inner join maat.entidad on organizacion.entidad_id = entidad.id
                where entidad.id = ?', [$request->params['userId']]);

            // Revisa que la id de la entidad con la que se quiere chatear no sea la misma que la del usuario
            $withIsOng = DB::select('select * from maat.organizacion
                        inner join maat.entidad on organizacion.entidad_id = entidad.id
                        where entidad.id = ?', [$request->params['id']]);

            // Guarda en $empr todas la organizacion de tipo empresa que cumpla con el requisito
            $empr = DB::select('select * from maat.empresa
                inner join maat.entidad on empresa.entidad_id = entidad.id
                where entidad.id = ?', [$request->params['userId']]);

            // Revisa que la id de la entidad con la que se quiere chatear no sea la misma que la del usuario
            $withIsEmpr = DB::select('select * from maat.empresa
                        inner join maat.entidad on empresa.entidad_id = entidad.id
                        where entidad.id = ?', [$request->params['id']]);

            // Es ONG el usuario, por lo que va a mostrar los chats de empresa
            if (
                count($ong) == 1 && $request->params['id'] != $request->params['userId'] &&
                count($withIsOng) < 1
            ) {
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
                }

                // Recoge los chats recientes (o sea los que hayan tenido contacto con la empresa
                // anteriormente)
                $recentChats = DB::select(
                    'select entidad.nombre, c1.empresa_id as entidad, mensaje.contenido
                    from maat.chat as c1
                    inner join (
                        select mensaje.chat_id
                        from maat.mensaje
                        group by mensaje.chat_id
                        order by mensaje.chat_id desc
                        ) c2
                    on c1.id = c2.chat_id
                    inner join mensaje on c2.chat_id = mensaje.chat_id
                    inner join maat.entidad on entidad.id = c1.empresa_id
                    where organizacion_id = ? and mensaje.id in (
                        select max(mensaje.id)
                        from maat.mensaje
                        where c2.chat_id = mensaje.chat_id
                        )',
                    [$request->params['userId']]
                );

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
                return ['chats' => $chatEmpresa, 'chatWith' => [$chatWith], 'recentChats' => $recentChats];

                // Es empresa el usuario, por lo que va a mostrar los chats de ONG
            } else if (
                count($empr) == 1 && $request->params['id'] != $request->params['userId'] &&
                count($withIsEmpr) < 1
            ) {
                // Guarda en $chatOngs todas las entidades ONGs
                $chatOngs = DB::select('select * from maat.entidad
                    inner join maat.organizacion on organizacion.entidad_id = entidad.id');

                // Mira con quien está chateando
                $chatWith = DB::select(
                    'select * from maat.chat
                    where chat.organizacion_id = ? and chat.empresa_id = ?',
                    [$request->params['id'], $request->params['userId']]
                );

                // Se ha usado el IN para poder coger los ultimos mensajes (valores concretos)
                // https://www.w3schools.com/mysql/mysql_in.asp
                // https://dev.mysql.com/doc/refman/8.0/en/non-typed-operators.html
                // Recoge los chats recientes (o sea los que hayan tenido contacto con la empresa
                // anteriormente)
                // Salia un error de clausula group by mayormente porque no puede agrupar diferentes
                // valores de una misma columna (en este caso el contenido del mensaje)
                $recentChats = DB::select(
                    'select entidad.nombre, c1.organizacion_id as entidad, mensaje.contenido
                    from maat.chat as c1
                    inner join (
                        select mensaje.chat_id
                        from maat.mensaje
                        group by mensaje.chat_id
                        order by mensaje.chat_id desc
                        ) c2
                    on c1.id = c2.chat_id
                    inner join mensaje on c2.chat_id = mensaje.chat_id
                    inner join maat.entidad on entidad.id = c1.organizacion_id
                    where empresa_id = ? and mensaje.id in (
                        select max(mensaje.id)
                        from maat.mensaje
                        where c2.chat_id = mensaje.chat_id
                        )',
                    [$request->params['userId']]
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
                }

                // Si existe, entonces abre el historial de chat con el usuario
                $chatWith = DB::select(
                    'select mensaje.id_origen, mensaje.id_destino, mensaje.contenido,
                        mensaje.fecha, mensaje.hora, entidad.nombre from maat.chat
                        inner join maat.mensaje on mensaje.chat_id = chat.id
                        inner join maat.entidad on entidad.id = chat.organizacion_id
                        where chat.organizacion_id = ? and chat.empresa_id = ?',
                    [$request->params['id'], $request->params['userId']]
                );

                // Mira todos los chats existentes.
                return ['chats' => $chatOngs, 'chatWith' => [$chatWith], 'recentChats' => $recentChats];
            } else {
                return "No existe";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // Coge el chat de la entidad seleccionada. Solo se accede por click, por lo que se puede ir
    // directamente a coger los datos
    public function getChatSelected(Request $request)
    {
        try {
            // Guarda en $ong todas la organizacion de tipo ong que cumpla con el requisito
            $ong = DB::select('select * from maat.organizacion
            inner join maat.entidad on organizacion.entidad_id = entidad.id
            where entidad.id = ?', [$request->params['userId']]);

            // Guarda en $empr todas la organizacion de tipo empresa que cumpla con el requisito
            $empr = DB::select('select * from maat.empresa
            inner join maat.entidad on empresa.entidad_id = entidad.id
            where entidad.id = ?', [$request->params['userId']]);

            // Es ONG el usuario, por lo que va a mostrar los chats de empresa
            if (count($ong) == 1) {
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
                }

                // Verifica que son distintas entidades (usuario y el del chat escogido)
                $getChatHistory = DB::select(
                    'select chat.id, entidad.nombre, mensaje.contenido, mensaje.fecha, mensaje.hora,
                    mensaje.id_origen, mensaje.id_destino
                    from maat.chat
                    inner join maat.mensaje on mensaje.chat_id = chat.id
                    inner join maat.entidad on entidad.id = chat.empresa_id
                    where chat.empresa_id = ? and chat.organizacion_id = ?',
                    [$request->params['id'], $request->params['userId']]
                );

                return $getChatHistory;
                // Es empresa el usuario, por lo que va a mostrar los chats de ONG
            } else if (count($empr) == 1) {
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
                }

                // Muestra todos los chats ONG
                $getChatHistory = DB::select(
                    'select chat.id, entidad.nombre, mensaje.contenido, mensaje.fecha, mensaje.hora,
                    mensaje.id_origen, mensaje.id_destino
                    from maat.chat
                    inner join maat.mensaje on mensaje.chat_id = chat.id
                    inner join maat.entidad on entidad.id = chat.organizacion_id
                    where chat.empresa_id = ? and chat.organizacion_id = ?',
                    [$request->params['userId'], $request->params['id']]
                );

                return $getChatHistory;
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // Método para enviar mensajes de chat
    public function sendChat(Request $request)
    {
        try {
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
                // Coge el id del chat del usuario para saber la id del chat al que pertenece el mensaje
                // enviado
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
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // Recoge el historial de mensajes de la entidad seleccionada (para constantemente)
    public function refreshChatSelected(Request $request)
    {
        try {
            // Guarda en $ong todas la organizacion de tipo ong que cumpla con el requisito
            $ong = DB::select('select * from maat.organizacion
                       inner join maat.entidad on organizacion.entidad_id = entidad.id
                       where entidad.id = ?', [$request->params['userId']]);

            // Guarda en $empr todas la organizacion de tipo empresa que cumpla con el requisito
            $empr = DB::select('select * from maat.empresa
                       inner join maat.entidad on empresa.entidad_id = entidad.id
                       where entidad.id = ?', [$request->params['userId']]);

            // Es ONG el usuario
            if (count($ong) == 1) {
                $refreshedChat = DB::select(
                    'select *
                    from maat.mensaje
                    inner join maat.chat on chat.id = mensaje.chat_id
                    where chat.empresa_id =? and chat.organizacion_id = ?
                    order by mensaje.id desc
                    limit 100',
                    [$request->params['id'], $request->params['userId']]
                );

                // Es empresa el usuario
            } else if (count($empr) == 1) {
                $refreshedChat = DB::select(
                    'select *
                    from maat.mensaje
                    inner join maat.chat on chat.id = mensaje.chat_id
                    where chat.empresa_id =? and chat.organizacion_id = ?
                    order by mensaje.id desc
                    limit 100',
                    [$request->params['userId'], $request->params['id']]
                );
            }

            return $refreshedChat;
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
