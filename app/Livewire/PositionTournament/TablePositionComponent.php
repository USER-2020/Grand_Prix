<?php

namespace App\Livewire\PositionTournament;

use Livewire\Component;

class TablePositionComponent extends Component
{
      
        // TODO: Esta tabla debe presentar en tiempo real quien es el que va de primero en el torneo items para el
        // paso de grupos es:
        // 1. Partidos ganados
        // 2. Sets a favor Sets en contra
        // 3. Puntos favor Puntos en contra

        // Para el desempate se tendra la diferecnia entre puntos y cociente

  
    public function render()
    {
        return view('livewire.position-tournament.table-position-component');
    }
}
