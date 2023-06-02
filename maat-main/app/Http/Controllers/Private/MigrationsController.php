<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Migrations;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class MigrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $migration = Migrations::all();
        // dd($migration);
        return Inertia::render('PrivateMaat/Migrations/MigrationsIndex', compact('migration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('PrivateMaat/Migrations/MigrationsCreate');
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
            'migration' => 'required|string|max:255',
            'batch' => 'required|string|max:255',
        ]);

        // dd($request);

        $migration = Migrations::create([
            'migration' => $request->migration,
            'batch' => $request->batch,
        ]);

        // $migration->save();

        return Redirect::route('indexMigrations');
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
        $migration = Migrations::find($id);
        return Inertia::render('PrivateMaat/Migrations/MigrationsEdit', [
            'migration' => $migration,
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
        Migrations::find($id)->update([
            'migration' => $request->migration,
            'batch' => $request->batch,
        ]);

        return Redirect::route('indexMigrations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $migration = Migrations::find($id);

        $migration->delete();

        return Redirect::route('indexMigrations');
    }

}
