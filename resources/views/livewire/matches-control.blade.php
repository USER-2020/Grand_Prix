<!-- En el archivo matches-control.blade.php -->
<div>
    <div class="mt-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha de inicio
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha final
                    </th>
                    <th class="px-6 py-3"></th> <!-- Espacio para botones -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:text-gray-300">
                @foreach($tournamentUsers as $tournamentUser)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-500">{{ $tournamentUser->tournament->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $tournamentUser->tournament->date_start }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $tournamentUser->tournament->date_close }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-primary-button wire:click="crearGruposAutomaticamente({{ $tournamentUser->tournament->id }})">Crear grupos automáticamente</x-primary-button>
                            <x-primary-button wire:click="crearGruposManualmente({{ $tournamentUser->tournament->id }})" style="pointer-events: none">Crear grupos manualmente</x-primary-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

