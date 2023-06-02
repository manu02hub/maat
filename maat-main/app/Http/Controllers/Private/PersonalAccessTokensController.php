<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personal_access_tokens;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class PersonalAccessTokensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalAccessToken = Personal_access_tokens::all();
        // dd($personalAccessToken);
        return Inertia::render('PrivateMaat/personalAccessToken/personalAccessTokenIndex', compact('personalAccessToken'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('PrivateMaat/personalAccessToken/personalAccessTokenCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tokenable_type' => 'required|string|max:255',
            'tokeneable_id' => 'required|int|max:11',
            'name' => 'required|string|max:255',
            'token' => 'required|int|max:11',
            'abilities' => 'required|string|max:255',
        ]);

        // dd($request);

        $personalAccessToken = Personal_access_tokens::create([
            'tokenable_type' => $request->tokenable_type,
            'tokeneable_id' => $request->tokeneable_id,
            'name' => $request->name,
            'token' => $request->token,
            'abilities' => $request->abilities,
        ]);

        // $migration->save();

        return Redirect::route('indexpersonalAccessToken');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $personalAccessToken = Personal_access_tokens::find($id);
        return Inertia::render('PrivateMaat/personalAccessToken/personalAccessTokenEdit', [
            'personalAccessToken' => $personalAccessToken,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // dd($request, $id);
        Personal_access_tokens::find($id)->update([
            'tokenable_type' => $request->tokenable_type,
            'tokeneable_id' => $request->tokeneable_id,
            'name' => $request->name,
            'token' => $request->token,
            'abilities' => $request->abilities,
        ]);

        return Redirect::route('indexpersonalAccessToken');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $personalAccessToken = Personal_access_tokens::find($id);

        $personalAccessToken->delete();

        return Redirect::route('indexpersonalAccessToken');
    }

}
