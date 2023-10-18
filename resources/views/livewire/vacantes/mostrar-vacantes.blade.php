<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @if (session('mensaje'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Vacante Creada!',
                    text: 'se creo con exito la vacante.',
                });
            </script>
        @endif
        @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{route('vacantes.show',$vacante->id)}}" class="text-xl font-bold">
                        {{$vacante->titulo}}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500">Último día: {{$vacante->ultimo_dia}}</p>
                </div>
                <div class="flex flex-col md:flex-row gap-3 mt-5 md:mt-0 md:items-center">
                    <a href="{{route('candidatos.index',$vacante)}}" class="text-center bg-slate-800 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">
                        {{$vacante->candidatos->count()}} Candidatos
                    </a>
                    <a href="{{route('vacantes.edit',$vacante->id)}}" class="text-center bg-blue-800 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">
                        Editar
                    </a>
                    <button wire:click="$dispatch('delete-vacante',{{$vacante->id}})" class="text-center bg-red-600 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-5 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endforelse
    </div>

    @if ($vacantes->count())
        <div class="p-5" >
            {{ $vacantes->links() }}
        </div>
    @endif
</div>
@push('js')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('delete-vacante', (event) => {
                Swal.fire({
                    title: 'Eliminar Vacante?',
                    text: "Una vacante eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.dispatch('delete',{id: event}); 
                        Swal.fire(
                            'Eliminado',
                            'Vacante eliminada con exito!',
                            'success'
                        );

                    }
                });
            });
        });
    </script>
@endpush

