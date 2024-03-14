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
                <!-- Puedes agregar más contenido aquí según tus necesidades -->
                @foreach ($usersByTeam as $teamId => $users)
                    {{--  <h2>Usuarios del Equipo ID: {{ $teamId }}</h2>  --}}
                    <ul>
                        @foreach ($users as $user)
                            <li>{{ $user->name }}</li>
                        @endforeach
                    </ul>
                @endforeach


            </div>
        @endforeach
    </div>


</div>
