<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('U teams') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('table u team belong.') }}
        </p>
    </header>

    <div class="py-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
        @foreach ($teams as $team)
            <a href="{{ route('manage.teams', ['team' => $team->id]) }}"
                class="bg-white overflow-hidden shadow-md rounded-lg sm:w-full">
                <div class="p-4 flex justify-between">
                    <h2 class="font-bold text-xl mb-2"> {{ $team->name }}</h2>
                    <x-secondary-button>
                        Manage team
                    </x-secondary-button>
                </div>
            </a>
        @endforeach
    </div>
</section>
