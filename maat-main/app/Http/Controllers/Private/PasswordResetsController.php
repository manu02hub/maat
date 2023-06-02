<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Password_resets;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class PasswordResetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passwordReset = Password_resets::all();
        // dd($passwordReset);
        return Inertia::render('PrivateMaat/passwordReset/passwordResetIndex', compact('passwordReset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('PrivateMaat/passwordReset/passwordResetCreate');
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
            'email' => 'required|string|max:255',
            'token' => 'required|string|max:255',
        ]);

        // dd($request);

        $passwordReset = Password_resets::create([
            'email' => $request->email,
            'token' => $request->token,
        ]);

        // $migration->save();

        return Redirect::route('indexPasswordReset');
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
        $passwordReset = Password_resets::find($id);
        return Inertia::render('PrivateMaat/passwordReset/passwordResetEdit', [
            'passwordReset' => $passwordReset,
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
        Password_resets::find($id)->update([
            'email' => $request->email,
            'token' => $request->token,
        ]);

        return Redirect::route('indexPasswordReset');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $passwordReset = Password_resets::find($id);

        $passwordReset->delete();

        return Redirect::route('indexPasswordReset');
    }

}
