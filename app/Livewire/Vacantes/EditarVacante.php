<?php

namespace App\Livewire\Vacantes;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;


class EditarVacante extends Component
{
    public $titulo;
    public $salario;
    public $imagen;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;

    public function mount(Vacante $vacante){
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = $vacante->ultimo_dia;
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.vacantes.editar-vacante',compact('salarios','categorias'));
    }
}
