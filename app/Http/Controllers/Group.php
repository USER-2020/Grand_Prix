<?php

namespace App\Http\Controllers;

use App\Models\Group as ModelsGroup;
use Illuminate\Http\Request;

class Group extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('groups.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $groupsWithTeams = ModelsGroup::where("tournament_id", $id)->get();
        // dd( $groupsWithTeams);
        return view('groups.index', compact('groupsWithTeams'));
        

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
