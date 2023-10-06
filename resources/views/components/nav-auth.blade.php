<div class="flex items-center justify-between mt-4">
    <x-normal-link :href="request()->is('login') ? route('register') : route('login')">
        {{ request()->is('login') ? 'Crear cuenta' : 'Iniciar sesión' }}
    </x-normal-link>
    
    
    <x-normal-link :href="route('password.request')">
        Olvidaste tu contraseña?
    </x-normal-link>
    
</div>