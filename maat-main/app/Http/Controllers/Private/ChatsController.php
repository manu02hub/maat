<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ChatsController extends Controller
{

    //INDEX
    public function index()
    {
        $chat = Chat::all();

        return Inertia::render('PrivateMaat/Chat/ChatIndex', compact('chat'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Chat/ChatCreate');
    }

    public function store(Request $request)
    {
        $chat = new Chat();
        $chat->empresa_id = $request->empresa_id;
        $chat->organizacion_id = $request->organizacion_id;
        $chat->save();

        return Redirect::route('indexChat');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $chat = Chat::findOrFail($id);
        return Inertia::render('PrivateMaat/Chat/ChatEdit', compact('chat'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $chat = Chat::findOrFail($id);

        $chat->update([
            'empresa_id' => $request->empresa_id,
            'organizacion_id' => $request->organizacion_id,
        ]);

        return Redirect::route('indexChat');
    }

    //DELETE
    public function destroy($id)
    {
        $chat = Chat::findOrFail($id);
        $chat->delete();
        return back();
    }
}
