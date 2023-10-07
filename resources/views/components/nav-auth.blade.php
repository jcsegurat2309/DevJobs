<div class="flex items-center justify-between mt-4">
    <x-normal-link :href="request()->is('login') ? route('register') : route('login')">
        {{ request()->is('login') ? 'Crear cuenta' : 'Iniciar sesión' }}
    </x-normal-link>
    
    @if (request()->routeIs('password.request'))
        <x-normal-link :href="route('register')">
            Crear cuenta
        </x-normal-link>    
    @else
    
        <x-normal-link :href="route('password.request')">
            ¿Olvidaste tu contraseña?
        </x-normal-link>
    @endif
    
</div>