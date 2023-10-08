<form class="md:w-1/2 space-y-5">
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" autofocus placeholder="Titulo vacante"/>
    </div>
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option selected>-- Selecciona una opción</option>

        </select>
    </div>
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option selected>-- Selecciona una opción</option>    
        </select>
       
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" name="empresa" :value="old('empresa')" placeholder="Nombre de la empresa: ej. Netflix, Uber, Shopify, etc."/>
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" name="ultimo_dia" :value="old('ultimo_dia')"/>
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Descripción del puesto')" />
        <x-text-area  class="w-full h-60" placeholder="Descripción general del puesto, experiencia" />
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" name="imagen" />
    </div>
    <x-primary-button class="w-full mt-5 justify-center">
        {{ __('Crear Vacante') }}
    </x-primary-button>
</form>
