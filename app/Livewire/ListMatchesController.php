<?php

namespace App\Livewire;

use App\Models\Set;
use App\Models\Score;
use App\Models\Partido;
use Livewire\Component;
use App\Models\TournamentPartido;
use App\Models\Group as ModelsGroup;
use Illuminate\Support\Facades\Route;

class ListMatchesController extends Component
{

    public $tournamentId;

    public $tournamentPartidos;

    public function mount()
    {
        // Inicializar la propiedad $this->tournamentPartidos como una colección vacía
        $this->tournamentPartidos = collect([]);

        // Obtener el ID del torneo desde la ruta
        $this->tournamentId = Route::current()->parameter('tournament');

        // Verificar si ya existen partidos asociados al torneo
        $tournamentPartidosExist = TournamentPartido::where("tournament_id", $this->tournamentId)->exists();

        // Si no existen partidos, entonces proceder a crearlos
        if (!$tournamentPartidosExist) {
            // Obtener los grupos asociados al torneo
            $groups = ModelsGroup::where('tournament_id', $this->tournamentId)->get();

            // Verificar si ya existen grupos asociados al torneo
            $groupsExist = $groups->isNotEmpty();

            if ($groupsExist) {
                // Obtener todos los equipos y convertirlos en una colección de objetos
                $allTeams = collect([]);
                foreach ($groups as $group) {
                    foreach ($group->teams as $team) {
                        $allTeams->push($team);
                    }
                }

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
                    if (!in_array($this->getPartidoId($team1Id, $team2Id), $this->tournamentPartidos->pluck('partido_id')->toArray())) {
                        $team1 = $allTeams->firstWhere('id', $team1Id);
                        $team2 = $allTeams->firstWhere('id', $team2Id);

                        // Crea el partido y guarda los datos
                        $partido = new Partido();
                        $partido->reference = "Partido entre " . $team1->name . " y " . $team2->name;
                        $partido->fase = "Fase de grupos";
                        $partido->activo = false;
                        $partido->save();

                        // Crear sets y scores para cada partido
                        for ($i = 1; $i <= 3; $i++) {
                            $score = new Score();
                            $score->partido_id = $partido->id;
                            $score->teamA_id = $team1Id; // Ajusta según tus necesidades
                            $score->teamB_id = $team2Id; // Ajusta según tus necesidades
                            $score->teamA_score = 0; // Ajusta según tus necesidades
                            $score->teamB_score = 0; // Ajusta según tus necesidades
                            $score->save();

                            $set = new Set();
                            $set->name = "Set $i";
                            $set->score_id = $score->id;
                            $set->partido_id = $partido->id;
                            $set->save();
                        }

                        // Guarda la asociación del partido con el torneo en la tabla intermedia
                        $tournamentPartido = new TournamentPartido();
                        $tournamentPartido->tournament_id = $this->tournamentId;
                        $tournamentPartido->partido_id = $partido->id;
                        $tournamentPartido->save();
                        $this->randomizar();
                    }
                }
            }
        } else {
            // Actualizar la propiedad $tournamentPartidos con los partidos existentes
            $this->tournamentPartidos = TournamentPartido::where("tournament_id", $this->tournamentId)
                ->whereNotNull('order')
                ->where('order', '<>', 0)
                ->orderBy('order', 'asc')
                ->get();
        }
    }





    public function render()
    {
        // Obtener los grupos y los partidos actualizados
        $groups = ModelsGroup::where('tournament_id', $this->tournamentId)->get();
        $tournamentPartidos = TournamentPartido::where("tournament_id", $this->tournamentId)
            ->whereNotNull('order')
            ->where('order', '<>', 0)
            ->orderBy('order', 'asc')
            ->with('partido')
            ->get()
            ->pluck('partido');


        return view('livewire.list-matches-controller', compact('groups', 'tournamentPartidos'));
    }





    public function randomizar()
    {
        // Obtener los partidos del torneo
        $tournamentPartidos = TournamentPartido::where("tournament_id", $this->tournamentId)->get();

        // Mezclar los partidos en un orden aleatorio
        $tournamentPartidos = $tournamentPartidos->shuffle();

        // Actualizar el orden en la base de datos
        $this->updatePartidoOrder($tournamentPartidos);

        // Actualizar la variable $tournamentPartidos con los partidos reordenados
        $this->tournamentPartidos = TournamentPartido::where("tournament_id", $this->tournamentId)
            ->whereNotNull('order')
            ->where('order', '<>', 0)
            ->orderBy('order', 'asc')
            ->get();

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

    public function toggleActivity($partidoId)
    {
        // Encuentra el partido por su ID
        $partido = Partido::find($partidoId);

        // Cambia el estado de activo
        $partido->activo = !$partido->activo;

        // Guarda los cambios en la base de datos
        $partido->save();
        // dd($partido);

        $this->render();

        // Actualiza la variable $tournamentPartidos con los cambios
        // $this->tournamentPartidos = TournamentPartido::where("tournament_id", $this->tournamentId)
        //     ->whereNotNull('order')
        //     ->where('order', '<>', 0)
        //     ->orderBy('order', 'asc')
        //     ->with('partido')
        //     ->get()
        //     ->pluck('partido');

        // Imprime la información para depurar
        // dump('Partido ID:', $partidoId);
        // dump('Nuevo estado de activo:', $partido->activo);
    }


}
