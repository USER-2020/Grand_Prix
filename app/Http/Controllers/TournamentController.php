<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tournaments = Tournament::all();
        return view('tournament.index', compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('tournament.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Valida los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'room_size' => 'required|numeric',
            'description' => 'nullable|string',
            'date_start' => 'required|date',
            'date_close' => 'required|date',
        ]);

        // Crea un nuevo modelo y guarda los datos
    $tournament = new Tournament($validatedData);
    $tournament->save();

    // Puedes redirigir a la vista de detalle o a cualquier otra página
    return redirect()->route('index.tournament', ['tournament' => $tournament->id])->with('status', 'tournament-create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
