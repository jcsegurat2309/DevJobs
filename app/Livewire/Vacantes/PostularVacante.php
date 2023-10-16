<?php

namespace App\Livewire\Vacantes;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule; 

class PostularVacante extends Component
{
    use WithFileUploads;

    public $vacante;

    #[Rule('required|mimes:pdf')]
    public $cv;

    public function postularme(){
        //valido el formulario
        $this->validate();
        //Almaceno el pdf del usuario a postularse
        $cv = $this->cv->store('public/cv');
        //obtengo el nombre del pedf para almacenarlo en la base de datos
        $cv_nombre = str_replace('public/cv/','',$cv);
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $cv_nombre
        ]);

        //Envio de notificación 

        session()->flash('mensaje','Se envio correctamente tu información, mucha suerte!');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.vacantes.postular-vacante');
    }
}
