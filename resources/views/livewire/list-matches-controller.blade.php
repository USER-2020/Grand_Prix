<div class="dark:bg-gray-800 p-4 rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4 dark:text-gray-300">Lista de partidos</h2>
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 dark:text-gray-300">Referencia</th>
                    <th class="px-4 py-2 dark:text-gray-300">Fase</th>
                    <th class="px-4 py-2 dark:text-gray-300">Actividad</th>
                    <th class="px-4 py-2 dark:text-gray-300">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tournamentPartidos as $partido)
                    <tr>
                        <td class="px-4 py-2 dark:text-gray-300">{{ $partido->partido->reference }}</td>
                        <td class="px-4 py-2 dark:text-gray-300">{{ $partido->partido->fase }}</td>
                        <td class="px-4 py-2 dark:text-gray-300">{{ $partido->activo ? 'Activo' : 'En espera' }}</td>
                        <td class="px-4 py-2 dark:text-gray-300">
                            <x-primary-button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"
                                wire:click="toggleActivity({{ $partido->id }})">
                                {{ $partido->activo ? 'Desactivar' : 'Activar' }}
                            </x-primary-button>
                            <x-secondary-button
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                                {{--  <a href="{{ route('ruta_de_la_vista_del_score', ['partido' => $partido->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">  --}}
                                <a href="#">
                                    Score
                                </a>
                            </x-secondary-button>
                            {{--  <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" wire:click="deletePartido({{ $partido->id }})">
                                Eliminar
                            </button>  --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
