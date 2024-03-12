<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Tournaments near you') }}
        </h2>
    </header>

    <div class="py-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
        @foreach ($tournaments as $tournament)
            <a href="{{ route('show.tournament', ['tournament' => $tournament->id]) }}" class="bg-white overflow-hidden shadow-md rounded-lg sm:w-full">
                <div class="p-4">
                    <div class="flex justify-between">
                        <div>
                            <h2 class="font-bold text-xl mb-2">{{ $tournament->name }}</h2>
                            <p class="text-gray-600">{{ $tournament->description }}</p>
                        </div>
                        <div>
                            <h2 class="font-bold text-xl mb-2">Cupos</h2>
                            <h2 class="font-bold text-xl mb-2">{{$tournament->room_size}}</h2>
                        </div>
                    </div>

                    {{-- Agrega más detalles según tus necesidades --}}
                    <div class="mt-4 flex justify-between items-center">
                        @if ($tournament->date_start)
                            <span class="text-sm text-gray-500">Fecha de Inicio: {{ $tournament->date_start }}</span>
                        @endif

                        @if ($tournament->date_close)
                            <span class="text-sm text-gray-500">Fecha de Cierre: {{ $tournament->date_close }}</span>
                        @endif
                    </div>
                </div>
            </a>
        @endforeach
    </div>

</section>
