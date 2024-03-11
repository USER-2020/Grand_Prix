<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('U tournaments') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Table for yu torunaments.') }}
        </p>
    </header>

    <div class="py-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
        @foreach ($tournaments as $tournament)
            <a href="#" class="bg-white overflow-hidden shadow-md rounded-lg sm:w-full">
                <div class="p-4">
                    <h2 class="font-bold text-xl mb-2">{{ $tournament->name }}</h2>
                    <p class="text-gray-600">{{ $tournament->description }}</p>
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
