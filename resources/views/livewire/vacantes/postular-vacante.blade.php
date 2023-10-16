<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @if (session()->has('mensaje'))
        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5">
            {{session('mensaje')}}
        </p>
    @else
        <form class="w-96 mt-5" wire:submit='postularme'>
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o hoja de vida')"></x-input-label>
                <input type="file" id="cv" accept=".pdf" class="block mt-1 w-full" wire:model="cv"/>
                <small wire:loading wire:target="cv" wire:target="postularme">Cargando...</small>
            </div>

            @error('cv')
                <livewire:vacantes.mostrar-alerta :message="$message">
            @enderror

            <x-primary-button class="mt-5">
                {{__('postularme')}}
            </x-primary-button>
        </form>
    @endif

    
</div>
