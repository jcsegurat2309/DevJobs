<?php

namespace App\Livewire\Vacantes;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;

class MostrarVacantes extends Component
{
    public function render()
    {
        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(10);
        return view('livewire.vacantes.mostrar-vacantes', compact('vacantes'));
    }
    #[On('delete')] 
    public function delete(Vacante $id){
        
        Storage::delete('public/vacantes/'.$id->imagen);
        $id->delete();
        /* return redirect()->route('dashboard'); */
    }
}
