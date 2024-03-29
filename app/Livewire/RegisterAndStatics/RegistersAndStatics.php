<?php

namespace App\Livewire\RegisterAndStatics;

use App\Models\Partido;
use App\Models\User;
use Livewire\Component;

class RegistersAndStatics extends Component
{
    public $users;
    public $partidos;


    public function mount()
    {
        $this->partidos = Partido::count();
        $this->users = User::role('player')->count();
    }
    public function render()
    {
        return view('livewire.register-and-statics.registers-and-statics');
    }
}
