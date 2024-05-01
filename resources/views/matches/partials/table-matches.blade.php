<section>
    <h2 class="dark:text-gray-300 font-weigth-300">
        Listado de Grupos y partidos creados
    </h2>

    <div class="container">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($groupsWithTeams as $group)
                <div class="rounded-lg overflow-hidden shadow-lg bg-white dark:bg-gray-800">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 dark:text-gray-300">{{ $group->name }}</div>
                        <ul class="text-gray-700 dark:text-gray-300">
                            @foreach ($group->teams as $team)
                                <li>{{ $team->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



</section>
