<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Tournament;
use App\Models\Spreadsheet;
use Illuminate\Http\Request;
use App\Models\SpreadsheetUser;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'player');
        })->get();
        $teams = Team::all();
        $tournaments = Tournament::all();
        return view('team.index', compact('teams', 'users', 'tournaments'));
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
        $request->validate([
            'name' => 'required|string|max:255|unique:teams',
        ]);

        $team = Team::create([
            'name' => $request->input('name'),
        ]);

        $spreadSheet = Spreadsheet::create([
            'team_id' => $team->id,
        ]);

        SpreadsheetUser::create([
            'spreadsheet_id' =>$spreadSheet->id,
            'user_id'=> Auth::user()->id,
        ]);


        return redirect()->route('index.teams')->with('status', 'Team created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'player');
        })->get();
        $teams = Team::all();
        $tournaments = Tournament::all();
        return view('team.show', compact('users','teams', 'tournaments'));
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
