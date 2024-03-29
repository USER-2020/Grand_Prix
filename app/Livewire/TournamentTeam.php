<?php

namespace App\Livewire;

use App\Models\Team;
use App\Models\Partido;
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
    public $usersByTeam = [];

    public function mount()
    {

        // Obtener el ID del torneo seleccionado
        $this->selectedTournamentId = Route::current()->parameter('tournament');

        // Cargar los equipos disponibles para el usuario autenticado
        $this->loadUserTeams();
    }

    public function render()
    {
        // Obtener todos los equipos asociados al torneo
        $this->associatedTeams = Teamtournament::with('team', 'tournament')
            ->where('tournament_id', $this->selectedTournamentId)
            ->get();
            // dd($this->associatedTeams);

        // Obtener los usuarios asociados a cada equipo
        foreach ($this->associatedTeams as $teamTournament) {
            $spreadsheet = $teamTournament->team->spreadsheet;
            if ($spreadsheet) {
                $selectedSpreadsheetId = $spreadsheet->id;
                $table_users = SpreadsheetUser::where('spreadsheet_id', $selectedSpreadsheetId)
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->take(13)
                    ->get()
                    ->pluck('user');
                $this->usersByTeam[$teamTournament->team->id] = $table_users;
            }
        }

        return view('livewire.tournament-team');
    }

    public function updateSelectedTeam()
    {
        // Verificar si el equipo ya está asociado al torneo
        $existingAssociation = Teamtournament::where('team_id', $this->selectedTeam)
            ->where('tournament_id', $this->selectedTournamentId)
            ->exists();


        // Si no existe la asociación, crea una nueva entrada en la tabla team_tournament
        if (!$existingAssociation) {
            Teamtournament::create([
                'team_id' => $this->selectedTeam,
                'tournament_id' => $this->selectedTournamentId,
            ]);

            $this->updateRoomSize();
        }
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

    protected function loadUserTeams()
    {
        // Obtener el ID del torneo seleccionado
        $selectedTournamentId = $this->selectedTournamentId;
        // dd($selectedTournamentId);

        // Obtener el ID del usuario autenticado
        $userId = auth()->id();


        // Obtener los equipos asociados al usuario autenticado a través de su spreadsheet
        $this->userTeams = Team::whereHas('spreadsheet.users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->whereDoesntHave('tournaments', function ($query) use ($selectedTournamentId) {
            $query->where('team_tournament.tournament_id', $selectedTournamentId);
        })->get();

        // dd($this->userTeams);

        // Si solo hay un equipo disponible, seleccionarlo automáticamente
        if ($this->userTeams->count() === 1) {
            $this->selectedTeam = $this->userTeams->first()->id;
            $this->updateSelectedTeam();
            // $this->updateRoomSize();
        }
    }
}
