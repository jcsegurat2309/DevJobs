<form class="md:w-1/2 space-y-5" wire:submit="guardarVacante">
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" autofocus placeholder="Titulo vacante"/>    
        @error('titulo')
            <livewire:vacantes.mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select wire:model="salario" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option selected>-- Selecciona una opción</option>
            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:vacantes.mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select wire:model="categoria" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option selected>-- Selecciona una opción</option>    
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
        @error('categoria')
            <livewire:vacantes.mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Nombre de la empresa: ej. Netflix, Uber, Shopify, etc."/>
        @error('empresa')
            <livewire:vacantes.mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"/>
        @error('ultimo_dia')
            <livewire:vacantes.mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Descripción del puesto')" />
        <x-text-area wire:model="descripcion" class="w-full h-60" placeholder="Descripción general del puesto, experiencia" />
        @error('descripcion')
            <livewire:vacantes.mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>    
        
         <x-input-label for="imagen" :value="__('Imagen')" />
        
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva"  accept="image/*"/>
        @error('imagen_nueva')
            <livewire:vacantes.mostrar-alerta :message="$message" />
        @enderror

        <div class="my-5 w-80">
            <x-input-label  :value="__('Imagen Actual')" />
            <img src="{{asset('storage/vacantes/'.$imagen)}}" alt="{{'Imagen Vacante'.$imagen}}">
        </div>
        <div class="my-5 w-80">
            @if ($imagen_nueva) 
                <div class="flex items-center justify-center my-4">
                    <small>Imagen Nueva:</small>
                    <img src="{{ $imagen_nueva->temporaryUrl() }}" class="w-3/4 rounded-md">
                </div>
            @endif 
        </div>
    </div>
    <x-primary-button class="w-full mt-5 justify-center" wire:loading.attr="disabled" wire:loading.class="opacity-70">
        {{ __('Actualizar Vacante') }}
    </x-primary-button>
</form>

