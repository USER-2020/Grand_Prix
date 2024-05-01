<?php

namespace App\Livewire\PositionTournament;

use App\Models\Partido;
use Livewire\Component;
use App\Models\TeamRanking;
use Illuminate\Support\Facades\Route;

class TablePositionComponent extends Component
{

    // TODO: Esta tabla debe presentar en tiempo real quien es el que va de primero en el torneo items para el
    // Sistema de puntuación 2
    // Partido ganado 2 puntos
    // Partido perdido 1 puntos
    // W cero puntos

    //     ITEMS DESEMPATE
    // Cuando están empatados en puntos se pasa a ver quién gano el partido entre los equipos empatados, a ese se la da el punto de desempate


    public $tournamentId;

    public function mount()
    {
        $this->tournamentId = Route::current()->parameter('tournament');
    }

    public function render()
    {
        // Filtrar los registros de TeamRanking para el torneo actual y ordenarlos por puntos de manera descendente
        $teamRankings = TeamRanking::where('tournament_id', $this->tournamentId)
            ->orderBy('points', 'desc')
            ->get();

        // Verificar si hay empates en los puntos
        $points = $teamRankings->pluck('points')->unique();
        // dd($points->count());
        if ($points->count() < $teamRankings->count()) {
            // Si hay empates, ajustar el orden según quién ganó el partido entre los equipos empatados
            // dd($points);
            foreach ($points as $point) {
                $teamsWithSamePoints = $teamRankings->where('points', $point);
                if ($teamsWithSamePoints->count() > 1) {
                    // Hay empate de puntos, necesitamos desempatar
                    foreach ($teamsWithSamePoints as $team) {
                        dd($teamsWithSamePoints);
                        // Buscar el ganador entre los equipos empatados
                        $winnerName = $this->getWinnerName($team->team->name);
                        dd($winnerName);
                        // Actualizar la posición del equipo en el ranking
                        $winnerTeam = $teamRankings->where('team_id', $winnerName)->first();
                        if ($winnerTeam) {
                            $team->position = $winnerTeam->position;
                        }
                    }
                }
            }
            // Ordenar nuevamente el ranking según la nueva posición
            $teamRankings = $teamRankings->sortBy('position');
        }

        return view('livewire.position-tournament.table-position-component', [
            'teamRankings' => $teamRankings
        ]);
    }


    public function getWinnerName($teamName)
    {
        $tournamentId = $this->tournamentId;

        // Buscar los partidos donde participó el equipo con el nombre dado
        $partidos = Partido::whereHas('tournaments', function ($query) use ($tournamentId) {
            $query->where('tournaments.id', $tournamentId); // Especifica 'tournaments.id' para evitar la ambigüedad
        })
            ->where('reference', 'like', '%' . $teamName . '%')
            ->get();

        // Almacenar los IDs de los partidos donde participó el equipo
        $partidoIds = $partidos->pluck('id');

        // Buscar el ganador del encuentro entre los equipos que están empatados por puntos
        $ganador = Partido::whereIn('id', $partidoIds)
            ->where('winner', '!=', null) // Excluir partidos sin ganador
            ->orderBy('id') // Ordenar por ID para obtener el primer partido como ganador
            ->first();

        if ($ganador) {
            // Obtener los nombres de los equipos en el partido
            $teams = explode(' y ', $ganador->reference);
            if ($teams[0] == $teamName) {
                return $teams[0]; // El equipo dado es el ganador
            } else {
                return $teams[1]; // El otro equipo es el ganador
            }
        }

        // Si no se encuentra ningún ganador, retornar null
        return null;
    }




}
