<?php

namespace App\Livewire;

use App\Models\Score;
use App\Models\Partido;
use Livewire\Component;
use App\Models\TournamentPartido;
use App\Models\Group as ModelsGroup;
use Illuminate\Support\Facades\Route;

class ListMatchesController extends Component
{
    public function mount()
    {
        // Obtener el ID del torneo desde la ruta
        $tournamentId = Route::current()->parameter('tournament');

        // Usar el ID del torneo para realizar la consulta en la base de datos
        $groups = ModelsGroup::where('tournament_id', $tournamentId)->get();

        if ($groups->count() == 2) {
            // Obtener todos los equipos y convertirlos en una colección de objetos
            $allTeams = collect([]);
            foreach ($groups as $group) {
                foreach ($group->teams as $team) {
                    $allTeams->push($team);
                }
            }

            // Obtener los partidos asociados al torneo
            $tournamentPartidos = TournamentPartido::where('tournament_id', $tournamentId)
                ->pluck('partido_id')
                ->toArray();

            // Obtener todas las combinaciones únicas de equipos
            $uniqueMatches = [];
            for ($i = 0; $i < count($allTeams) - 1; $i++) {
                for ($j = $i + 1; $j < count($allTeams); $j++) {
                    $team1Id = $allTeams[$i]->id;
                    $team2Id = $allTeams[$j]->id;
                    // Garantizar que la combinación esté ordenada para evitar duplicados
                    $matchKey = $team1Id < $team2Id ? "$team1Id-$team2Id" : "$team2Id-$team1Id";
                    $uniqueMatches[$matchKey] = [$team1Id, $team2Id];
                }
            }

            // Crear un partido para cada combinación única de equipos si no existen previamente
            foreach ($uniqueMatches as $match) {
                [$team1Id, $team2Id] = $match;

                // Verificar si ya existe un partido para esta combinación
                if (!in_array($this->getPartidoId($team1Id, $team2Id), $tournamentPartidos)) {
                    $team1 = $allTeams->firstWhere('id', $team1Id);
                    $team2 = $allTeams->firstWhere('id', $team2Id);

                    // Crea el partido y guarda los datos
                    $partido = new Partido();
                    $partido->reference = "Partido entre " . $team1->name . " y " . $team2->name;
                    $partido->fase = "Fase de grupos";
                    $partido->activo = false;
                    $partido->save();

                    // Asocia los equipos al partido
                    $score = new Score();
                    $score->partido_id = $partido->id;
                    $score->teamA_id = $team1Id;
                    $score->teamB_id = $team2Id;
                    $score->teamA_score = 0;
                    $score->teamB_score = 0;
                    $score->save();

                    // Guarda la asociación del partido con el torneo en la tabla intermedia
                    $tournamentPartido = new TournamentPartido();
                    $tournamentPartido->tournament_id = $tournamentId;
                    $tournamentPartido->partido_id = $partido->id;
                    $tournamentPartido->save();
                }
            }
        }
    }


    public function render()
    {
        $tournamentId = Route::current()->parameter('tournament');
        // Usar el ID del torneo para realizar la consulta en la base de datos
        $groups = ModelsGroup::where('tournament_id', $tournamentId)->get();
        $tournamentPartidos = TournamentPartido::where("tournament_id", $tournamentId)->get();

        // Mezclar los partidos en un orden aleatorio
        $tournamentPartidos = $tournamentPartidos->shuffle();

        // Actualizar el orden en la base de datos
        $this->updatePartidoOrder($tournamentPartidos);

        return view('livewire.list-matches-controller', compact('groups', 'tournamentPartidos'));
    }

    private function updatePartidoOrder($tournamentPartidos)
    {
        foreach ($tournamentPartidos as $index => $partido) {
            $partido->order = $index + 1; // Asignar el nuevo orden basado en el índice mezclado
            $partido->save(); // Guardar el cambio en la base de datos
        }
    }

    // Función para obtener el ID del partido dado los IDs de los equipos
    private function getPartidoId($teamAId, $teamBId)
    {
        // Buscar un partido existente en la tabla 'scores' para los equipos dados
        $existingScore = Score::where(function ($query) use ($teamAId, $teamBId) {
            $query->where('teamA_id', $teamAId)->where('teamB_id', $teamBId);
        })->orWhere(function ($query) use ($teamAId, $teamBId) {
            $query->where('teamA_id', $teamBId)->where('teamB_id', $teamAId);
        })->first();

        // Si se encuentra un registro en la tabla 'scores', devuelve el ID del partido asociado
        if ($existingScore) {
            return $existingScore->partido_id;
        }

        // Si no se encuentra ningún partido existente, devuelve null
        return null;
    }
}
