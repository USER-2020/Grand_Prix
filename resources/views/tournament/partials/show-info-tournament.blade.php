<section>
    <header>

        <div class="flex justify-between">
            <div>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Description') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 ">{{ $tournament->description }}</p>
            </div>
            {{--  <div>
                <p class="text-lg font-medium text-gray-900 dark:text-gray-100"
                    style="font-size: 50px; text-align:center">Cupos: {{ $tournament->room_size }}</p>
            </div>  --}}
        </div>
    </header>

    <div class="py-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
        @livewire('tournament-team')
    </div>
</section>
