<?php

namespace App\Livewire\Vacantes;

use App\Models\Salario;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Vacante;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule; 

class CrearVacantes extends Component
{
    use WithFileUploads;
    #[Rule('required|string')]
    public $titulo; 
    
    #[Rule('required')]
    public $salario;

    #[Rule('required')]
    public $empresa;

    #[Rule('required')]
    public $categoria;

    #[Rule('required')]
    public $ultimo_dia; 

    #[Rule('required')]
    public $descripcion;

    #[Rule('required|image|max:1024')]
    public $imagen;

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.vacantes.crear-vacantes', compact('salarios','categorias'));
    }

    public function crearVacante(){
        $this->validate();
        //Subir Img
        $imagen = $this->imagen->store('public/vacantes');
        $nombre_Imagen = str_replace('public/vacantes/','',$imagen);
        
        //Crear registro
        Vacante::create([
            'titulo' => $this->titulo,
            'salario_id' => $this->salario,
            'categoria_id' => $this->categoria,
            'empresa' => $this->empresa,
            'ultimo_dia' => $this->ultimo_dia,
            'descripcion' => $this->descripcion,
            'imagen' => $nombre_Imagen,
            'user_id' => auth()->user()->id 
        ]);
        //Mensaje de Sesión
        session()->flash('mensaje','La vacante se publico correctamente');
        return redirect()->route('dashboard');
    }
}
