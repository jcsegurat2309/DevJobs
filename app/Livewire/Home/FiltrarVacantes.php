<?php

namespace App\Livewire\Home;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{

    public $termino; 
    public $categoria;
    public $salario;

    public function leerDatosFormulario(){
        $this->dispatch('buscar', termino:$this->termino, categoria:$this->categoria, salario:$this->salario);
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.home.filtrar-vacantes', compact('salarios','categorias'));
    }
}
