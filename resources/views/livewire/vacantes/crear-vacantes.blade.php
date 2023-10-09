<form class="md:w-1/2 space-y-5" wire:submit="crearVacante">
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
        @if ($imagen) 
            <div class="flex items-center justify-center my-4">
                <img src="{{ $imagen->temporaryUrl() }}" class="w-3/4 rounded-md">
            </div>
        @endif
        <x-input-label for="imagen" :value="__('Imagen')" />
        <div wire:loading wire:target="imagen" class="font-semibold text-center">
            <p>Cargando...</p>
        </div>
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen"  accept="image/*"/>
        @error('imagen')
            <livewire:vacantes.mostrar-alerta :message="$message" />
        @enderror
    </div>
    <x-primary-button class="w-full mt-5 justify-center" wire:loading.attr="disabled" wire:loading.class="opacity-70">
        {{ __('Crear Vacante') }}
    </x-primary-button>
</form>
