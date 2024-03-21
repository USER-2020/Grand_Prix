<?php

namespace App\Livewire;

use App\Models\Set;
use App\Models\Partido;
use Livewire\Component;
use App\Models\Score as ScoreModel;
use Illuminate\Support\Facades\Log;

class Score extends Component
{
    public $partido;
    public $partidoInfo;
    public $teamAScore;
    public $teamBScore;
    public $sets;
    public $selectedSet;

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
        // Guardar el nuevo puntaje en la base de datos
        $this->updateScore();
    }

    // Método para decrementar el puntaje del equipo A
    public function decreaseTeamAScore()
    {
        // Verificar que el puntaje del equipo A sea mayor que 0 antes de decrementar
        if ($this->teamAScore > 0) {
            // Decrementar el puntaje del equipo A
            $this->teamAScore--;
            // Guardar el nuevo puntaje en la base de datos
            $this->updateScore();
        }
    }

    public function increaseTeamBScore()
    {
        // Incrementar el puntaje del equipo B
        $this->teamBScore++;
        // Guardar el nuevo puntaje en la base de datos
        $this->updateScore();
    }

    // Método para decrementar el puntaje del equipo B
    public function decreaseTeamBScore()
    {
        // Verificar que el puntaje del equipo B sea mayor que 0 antes de decrementar
        if ($this->teamBScore > 0) {
            // Decrementar el puntaje del equipo B
            $this->teamBScore--;
            // Guardar el nuevo puntaje en la base de datos
            $this->updateScore();
        }
    }

    public function updateScore()
    {
        $set = Set::findOrFail($this->selectedSet);
        // Buscar el puntaje del partido en la base de datos
        $score = $set->scores()->where('partido_id', $this->partido->id)->first();
        // Actualizar los puntajes de los equipos
        $score->teamA_score = $this->teamAScore;
        $score->teamB_score = $this->teamBScore;
        $score->save();
    }

    public function render()
    {
        // Obtener los sets asociados al partido
        $sets = Set::where('partido_id', $this->partido->id)->get();
        $partidoInfo = ScoreModel::where('partido_id', $this->partido->id)->first();

        if ($partidoInfo) {
            $teamA_name = $partidoInfo->teamA->name;
            $teamB_name = $partidoInfo->teamB->name;

            // dd($teamA_name, $teamB_name);
        } else {
            // Manejar la situación en caso de que no se encuentre un registro de ScoreModel para el partido dado
        }

        return view('livewire.score', [
            'sets' => $sets,
            'teamA_name' => $teamA_name,
            'teamB_name' => $teamB_name,
        ]);
    }
}
