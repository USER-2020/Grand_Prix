<div>
    <label for="users" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Jugadores</label>
    <select name="users[]" id="users" class="mt-1 p-2 border rounded-md w-full" multiple wire:model="selectedUsers"
        wire:change="updateSelectedUsers">
        @if ($users)
            @foreach ($users as $user)
                @if (!in_array($user->id, $table_users->pluck('id')->toArray()))
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        @else
            <option value="" disabled selected>No hay jugadores disponibles</option>
        @endif
    </select>


    <form wire:submit.prevent="addUser">
        <div class="mb-4">
            <label for="newUserName" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Nombre</label>
            <x-text-input type="text" wire:model="newUserName" id="newUserName"
                class="mt-1 p-2 border rounded-md w-full" required />
        </div>

        <div class="mb-4">
            <label for="newUserEmail" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Correo
                Electrónico</label>
            <x-text-input type="email" wire:model="newUserEmail" id="newUserEmail"
                class="mt-1 p-2 border rounded-md w-full" required />
        </div>

        <div class="flex items-center justify-end">
            <x-primary-button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Agregar
                Usuario</x-primary-button>
        </div>
    </form>

    <div>
        <h3 class="text-white px-4 py-2 rounded-md mr-2">Usuarios de la tabla relacionada:</h3>

        @if ($table_users && count($table_users) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th class="bg-gray-500 bg-opacity-25 text-white px-4 py-2 rounded-md mr-2">Nombre</th>
                        <th class="bg-gray-500 bg-opacity-25 text-white px-4 py-2 rounded-md mr-2">Correo Electrónico</th>
                        <th class="bg-gray-500 bg-opacity-25 text-white px-4 py-2 rounded-md mr-2">Acciones</th> {{-- Nueva columna para botones de acción --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($table_users as $tableUser)
                        <tr>
                            <td class="text-white px-4 py-2 rounded-md mr-2">{{ $tableUser->name }}</td>
                            <td class="text-white px-4 py-2 rounded-md mr-2">{{ $tableUser->email }}</td>
                            <td class="flex justify-between">

                                <x-primary-button class="mr-3"> Editar</x-primary-button>
                                <x-danger-button wire:click="deleteUser({{ $tableUser->id }})">Borrar</x-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2">No hay usuarios en la tabla relacionada.</p>
        @endif
    </div>



    {{--  <div class="mt-4">
        <x-primary-button wire:click="associateData" class="px-4 py-2 bg-green-500 text-white rounded-md">Asociar Datos</x-primary-button>
    </div>  --}}
</div>
