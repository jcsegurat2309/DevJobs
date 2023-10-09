<?php

namespace App\Livewire\Vacantes;

use Livewire\Component;

class MostrarAlerta extends Component
{
    public $message;
    public function render()
    {
        return view('livewire.vacantes.mostrar-alerta');
    }
}
