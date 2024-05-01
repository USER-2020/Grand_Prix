<?php

namespace App\Livewire;

use App\Models\Set;
use App\Models\Partido;
use Livewire\Component;
use App\Models\TeamRanking;
use App\Models\TournamentPartido;
use App\Models\Score as ScoreModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class Score extends Component
{
    public $partido;
    public $partidoInfo;
    public $teamAScore;
    public $teamBScore;
    public $sets;
    public $selectedSet;
    public $winner;

    protected $listeners = ['scoreUpdated' => 'loadScores'];

    public function mount()
    {
        // Obtener información del partido
        $this->partidoInfo = Partido::findOrFail($this->partido->id);

        // Obtener los sets asociados al partido
        $this->sets = Set::where('partido_id', $this->partido->id)->get();

        // Establecer el set 1 como seleccionado por defecto
        $defaultSet = $this->sets->firstWhere('name', 'Set 1');
        $this->selectedSet = $defaultSet ? $defaultSet->id : null;

        // Cargar los puntajes del set 1 por defecto
        $this->loadScores();
    }

    public function loadScores()
    {
        if ($this->selectedSet) {
            // Obtener el set seleccionado
            $set = Set::findOrFail($this->selectedSet);

            // Obtener el puntaje asociado al set y al partido actual
            $score = $set->scores()->where('partido_id', $this->partido->id)->first();

            // Verificar si se encontró un puntaje asociado al set seleccionado
            if ($score) {
                $this->teamAScore = $score->teamA_score;
                $this->teamBScore = $score->teamB_score;
            } else {
                // Si no se encontró un puntaje asociado, establecer puntajes predeterminados o manejar la situación según sea necesario
                $this->teamAScore = 0;
                $this->teamBScore = 0;
            }
        } else {
            // Si no se ha seleccionado ningún set, establecer puntajes predeterminados o manejar la situación según sea necesario
            $this->teamAScore = 0;
            $this->teamBScore = 0;
        }
    }

    public function updatedSelectedSet($value)
    {
        // Cuando se actualice el set seleccionado, cargar los puntajes del nuevo set
        $this->loadScores();
    }

    public function increaseTeamAScore()
    {
        // Incrementar el puntaje del equipo A
        $this->teamAScore++;
        // Guardar el nuevo puntaje en la base de datos y cargar el puntaje actualizado
        $this->updateScore($this->teamAScore, $this->teamBScore);
    }

    public function decreaseTeamAScore()
    {
        // Verificar que el puntaje del equipo A sea mayor que 0 antes de decrementar
        if ($this->teamAScore > 0) {
            // Decrementar el puntaje del equipo A
            $this->teamAScore--;
            // Guardar el nuevo puntaje en la base de datos y cargar el puntaje actualizado
            $this->updateScore($this->teamAScore, $this->teamBScore);
        }
    }

    public function increaseTeamBScore()
    {
        // Incrementar el puntaje del equipo B
        $this->teamBScore++;
        // Guardar el nuevo puntaje en la base de datos y cargar el puntaje actualizado
        $this->updateScore($this->teamAScore, $this->teamBScore);
    }

    public function decreaseTeamBScore()
    {
        // Verificar que el puntaje del equipo B sea mayor que 0 antes de decrementar
        if ($this->teamBScore > 0) {
            // Decrementar el puntaje del equipo B
            $this->teamBScore--;
            // Guardar el nuevo puntaje en la base de datos y cargar el puntaje actualizado
            $this->updateScore($this->teamAScore, $this->teamBScore);
        }
    }

    public function updateTeamAScore($newScore)
    {
        // Actualizar el puntaje del equipo A en la base de datos
        $this->updateScore($newScore, $this->teamBScore);
    }

    public function updateTeamBScore($newScore)
    {
        // Actualizar el puntaje del equipo B en la base de datos
        $this->updateScore($this->teamAScore, $newScore);
    }

    public function updateScore($teamAScore, $teamBScore)
    {
        $set = Set::findOrFail($this->selectedSet);
        // Buscar el puntaje del partido en la base de datos
        $score = $set->scores()->where('partido_id', $this->partido->id)->first();
        // Actualizar los puntajes de los equipos
        $score->teamA_score = $teamAScore;
        $score->teamB_score = $teamBScore;
        $score->save();
        // Cargar los puntajes actualizados
        $this->loadScores();
    }

    public function changueFinishState()
    {
        // Cambiar el estado de finalización del partido terminado
        $this->partido->finish = !$this->partido->finish;
        $this->partido->save();



    }

    public function updateRanking()
    {
        // Inicializar el ID del torneo como null
        $tournamentId = null;

        // Obtener la información del partido desde la tabla intermedia TournamentPartido
        $tournamentPartido = TournamentPartido::findOrFail($this->partido->id);
        $partido = Partido::findOrFail($this->partido->id);

        // Verificar si se seleccionó un ganador
        if ($this->winner && $tournamentPartido) {
            // Obtener el ID del torneo asociado al partido
            $tournamentId = $tournamentPartido->tournament_id;

            // Incrementar los puntos del equipo ganador en la tabla de clasificación
            TeamRanking::where('tournament_id', $tournamentId)
                ->where('team_id', $this->winner)
                ->firstOrCreate(
                    ['tournament_id' => $tournamentId, 'team_id' => $this->winner],
                    ['points' => 0] // Establecer los puntos iniciales como 0 si no existe el registro
                )
                ->increment('points', 2); // Incrementar en 2 puntos al equipo ganador
            //Actualizando la columna de winner
            $partido->update(['winner' => $this->winner]);

            // Obtener la información del partido desde el modelo ScoreModel
            $partidoInfo = ScoreModel::where('partido_id', $this->partido->id)->first();

            // Verificar si se encontró la información del partido
            if ($partidoInfo) {
                // Obtener el ID del equipo perdedor
                $loserId = $this->winner == $partidoInfo->teamA_id ? $partidoInfo->teamB_id : $partidoInfo->teamA_id;

                // Incrementar los puntos del equipo perdedor en la tabla de clasificación
                TeamRanking::where('tournament_id', $tournamentId)
                    ->where('team_id', $loserId)
                    ->firstOrCreate(
                        ['tournament_id' => $tournamentId, 'team_id' => $loserId],
                        ['points' => 0] // Establecer los puntos iniciales como 0 si no existe el registro
                    )
                    ->increment('points', 1); // Incrementar en 1 punto al equipo perdedor
            }
        }

        // Cambiar el estado de finalización del partido terminado
        $this->changueFinishState();

        // Redirigir a la página de administración de grupos con el último ID de torneo
        return Redirect::route('admin.groups-aut', $tournamentId);
    }




    public function render()
    {
        // Obtener los sets asociados al partido
        $sets = Set::where('partido_id', $this->partido->id)->get();
        $partidoInfo = ScoreModel::where('partido_id', $this->partido->id)->first();

        if ($partidoInfo) {
            $teamA_name = $partidoInfo->teamA->name;
            $teamA_id = $partidoInfo->teamA->id;
            $teamB_name = $partidoInfo->teamB->name;
            $teamB_id = $partidoInfo->teamB->id;
        } else {
            // Manejar la situación en caso de que no se encuentre un registro de ScoreModel para el partido dado
        }

        return view('livewire.score', [
            'sets' => $sets,
            'teamA_name' => $teamA_name,
            'teamB_name' => $teamB_name,
            'teamA_id' => $teamA_id,
            'teamB_id' => $teamB_id,
        ]);
    }
}
