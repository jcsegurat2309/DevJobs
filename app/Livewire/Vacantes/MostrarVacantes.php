<?php

namespace App\Livewire\Vacantes;

use Livewire\Component;
use App\Models\Vacante;

class MostrarVacantes extends Component
{
    public function render()
    {
        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(10);
        return view('livewire.vacantes.mostrar-vacantes', compact('vacantes'));
    }
}
