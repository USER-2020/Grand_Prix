<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;
use App\Models\Tournament;
use App\Models\Teamtournament;
use App\Models\SpreadsheetUser;
use Illuminate\Support\Facades\Route;

class TournamentTeam extends Component
{

    public $selectedTournamentId;
    public $userTeams = [];
    public $selectedTeam;
    public $associatedTeams = [];


    public function mount()
    {
        $this->selectedTournamentId = Route::current()->parameter('tournament');
        $this->userTeams = Team::all();

    }

    public function render()
    {
        // Obtén todos los registros de la tabla Teamtournament con sus relaciones de equipo y torneo cargadas
        $this->associatedTeams = Teamtournament::with('team', 'tournament')->get();
        return view('livewire.tournament-team');
    }

    public function updateSelectedTeam()
    {
        // $this->selectedTeam contiene el valor seleccionado del dropdown
        Teamtournament::create([
            'team_id' => $this->selectedTeam,
            'tournament_id' => $this->selectedTournamentId,
        ]);

        $this->updateRoomSize();
    }



    public function updateRoomSize()
    {
        
        // Buscar el torneo por ID
        $tournament = Tournament::find($this->selectedTournamentId);
        // Verificar si el torneo existe
        // dd($tournament);
        if ($tournament) {
            // Actualizar la propiedad roomsize (ajusta esto según el nombre real del atributo en tu modelo)

            $currentRoomSize = $tournament->room_size;
            // dd($currentRoomSize);

            // Verificar si el valor actual es mayor que 0 antes de restar 1
            if ($currentRoomSize > 0) {
                // Reducir el valor en 1
                $newRoomSize = $currentRoomSize - 1;
                
                // Actualizar la propiedad roomsize en la base de datos
                $tournament->update(['room_size' => $newRoomSize]);

                // Puedes agregar cualquier lógica adicional aquí

                // Volver a renderizar el componente
                $this->render();
            } else {
                // Manejar el caso en el que el torneo no se encuentra
                // Puedes mostrar un mensaje de error o realizar otra acción según tus necesidades
            }
        }

    }
}