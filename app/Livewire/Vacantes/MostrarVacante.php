<?php

namespace App\Livewire\Vacantes;

use Livewire\Component;

class MostrarVacante extends Component
{
    public $vacante;
    public function render()
    {
        return view('livewire.vacantes.mostrar-vacante');
    }
}
