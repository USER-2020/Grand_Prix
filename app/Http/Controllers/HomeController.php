<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tournaments = Tournament::all();
        return view('dashboard', compact('tournaments'));
    }

    public function show(string $id)
    {
        $tournament = Tournament::find($id);
        if (!$tournament)
            abort(404, 'This tournament does not exist!');
        return view("tournament.show", ["tournament" => $tournament]);
    }
}
