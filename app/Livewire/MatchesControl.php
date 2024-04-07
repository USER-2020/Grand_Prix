<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;
use App\Models\Tournament;
use App\Models\Teamtournament;
use App\Models\TournamentUser;

class MatchesControl extends Component
{
    public $tournamentUser = [];

    public $tournamentTeams = [];
    public $tournament_id;

    // public $showMessage = false;

    public function mount()
    {
        $this->tournamentUser = TournamentUser::where([
            "user_id" => auth()->id(),
            // "tournament_id" => request()->route('tournament')
        ])->get();
        // dd($this->tournamentUser);


    }
    public function render()
    {

        // Obtener todos los registros de TournamentUser asociados al usuario autenticado
        $tournamentUsers = TournamentUser::where("user_id", auth()->id())->get();
        return view('livewire.matches-control', [
            'tournamentUsers' => $tournamentUsers,
        ]);
    }

    public function crearGruposAutomaticamente($tournamentId)
    {
        // Verificar si ya existen grupos para el torneo
        if (Group::where('tournament_id', $tournamentId)->exists()) {
            // Si ya existen grupos, no es necesario crearlos nuevamente
            session()->flash('message', 'Ya existen grupos para este torneo.');
        } else {
            // Si no existen grupos, proceder a crearlos

            $tournamentTeams = Teamtournament::where("tournament_id", $tournamentId)->get();
            $countTournamentsTeams = $tournamentTeams->count();

            // Determinar la cantidad de grupos necesarios según la cantidad de equipos
            $countGroups = 0;
            if ($countTournamentsTeams >= 4 && $countTournamentsTeams <= 5) {
                $countGroups = 1;
            if ($countTournamentsTeams >= 4 && $countTournamentsTeams <= 10) {
                $countGroups = 2;
            } elseif ($countTournamentsTeams >= 11 && $countTournamentsTeams <= 15) {
                $countGroups = 3;
            } else {
                session()->flash('message', 'El número de equipos no permite generar grupos automáticos.');
                return redirect()->route('admin.tournaments.show', $tournamentId);
            }

            // Crear los grupos
            $groups = [];
            for ($i = 1; $i <= $countGroups; $i++) {
                $group = new Group();
                $group->name = "Grupo $i";
                $group->tournament_id = $tournamentId; // Asociar el grupo al torneo especificado
                $group->save();
                $groups[] = $group;
            }

            // Distribuir aleatoriamente los equipos en los grupos
            $tournamentTeams->shuffle();
            $groupIndex = 0;
            foreach ($tournamentTeams as $tournamentTeam) {
                $group = $groups[$groupIndex];
                $group->teams()->attach($tournamentTeam->team_id);
                $group->save();
                $groupIndex = ($groupIndex + 1) % count($groups);
            }

            
            
        }

        return redirect()->route('admin.groups-aut', ['tournament' => $tournamentId]);
    }



    public function crearGruposManualmente($tournamentId)
    {

        return redirect()->route('admin.groups-man', ['tournament' => $tournamentId]);
    }
}
