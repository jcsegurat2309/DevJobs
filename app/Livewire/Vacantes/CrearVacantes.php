<?php

namespace App\Livewire\Vacantes;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class CrearVacantes extends Component
{
    
    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.vacantes.crear-vacantes', compact('salarios','categorias'));
    }
}
