<div>
    <label for="teamDropdown">Selecciona un equipo:</label>
    <select wire:model="selectedTeam" id="teamDropdown" wire:change="updateSelectedTeam">
        @foreach ($userTeams as $team)
            @if (!in_array($team->id, $associatedTeams->pluck('id')->toArray()))
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endif
        @endforeach
    </select>



    <div id="teamCardsContainer" class="flex flex-wrap">
        @foreach ($associatedTeams as $team)
            <div class="card m-2 p-4 bg-white dark:bg-gray-800 shadow-md rounded-md">
                <h3 class="text-lg font-semibold">{{ $team->team->name }}</h3>
                <p>Torneo: {{ $team->tournament->nombre }}</p>
                <!-- Puedes agregar más contenido aquí según tus necesidades -->
                <div class="mt-2">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2">Editar</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded-md"
                        wire:click="deleteTeam({{ $team->id }})">Borrar</button>
                </div>
            </div>
        @endforeach
    </div>


</div>
