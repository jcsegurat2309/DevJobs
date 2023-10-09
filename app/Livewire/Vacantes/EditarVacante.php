<?php

namespace App\Livewire\Vacantes;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule; 
use Illuminate\Support\Facades\Storage;


class EditarVacante extends Component
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

    public $imagen;

    public $vacante_id;
    #[Rule('nullable|image|max:1024')]
    public $imagen_nueva;

    public function mount(Vacante $vacante){
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = $vacante->ultimo_dia;
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function guardarVacante(){
        //Validación del formulario
        $datos = $this->validate();

        //comprobación img nueva
        if($this->imagen_nueva){

            //Elimino la img anterior
            Storage::delete('public/vacantes/'.$this->imagen);
            
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/','',$imagen);
        }

        //Actualización de datos
        $vacante = Vacante::find($this->vacante_id);
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;
        $vacante->save();
        //Redirecionamiento con mensaje flash
        session()->flash('mensaje','La vacante se actualizo correctamente.'); 
        return redirect()->route('dashboard');
    }

    public function render()
    {
        
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.vacantes.editar-vacante',compact('salarios','categorias'));
    }
}
