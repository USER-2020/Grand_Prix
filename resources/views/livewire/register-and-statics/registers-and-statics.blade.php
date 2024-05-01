<!-- livewire/register-and-statics/registers-and-statics.blade.php -->

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <!-- Card de usuarios -->
    <div class="flex-1 bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-blue-500 dark:bg-blue-700 rounded-md p-3">
                    <!-- Icono de usuarios -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6c1.6569 0 3-1.34315 3-3s-1.3431-3-3-3-3 1.34315-3 3 1.3431 3 3 3zM12 12a3 3 0 100-6 3 3 0 000 6zm0 0a7 7 0 00-4.79657 12.2041l.05109.0457c1.34428 1.1482 3.28414 1.7501 5.24548 1.7501 1.96135 0 3.90121-.6019 5.24549-1.7501l.0511-.0457A7.00153 7.00153 0 0012 12zm10-1v7a1 1 0 01-1 1H3a1 1 0 01-1-1V11a9.0003 9.0003 0 015.4651-8.2471 1.00005 1.00005 0 011.0698 0A9.0003 9.0003 0 0119 11z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                            Jugadores Registrados
                        </dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-gray-900 dark:text-gray-200">
                                {{ $users }}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Card de partidos -->
    <div class="flex-1 bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-500 dark:bg-green-700 rounded-md p-3">
                    <!-- Icono de partidos -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 8c1.6569 0 3-1.34315 3-3s-1.3431-3-3-3-3 1.34315-3 3 1.3431 3 3 3zM21 20v-7a4.9973 4.9973 0 00-3.8623-4.8741 8.0008 8.0008 0 10-7.2754 0A4.9973 4.9973 0 003 13v7M3 20h18a2 2 0 002-2V9a2 2 0 00-2-2h-4l-3-3h-4l-3 3H3a2 2 0 00-2 2v9a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                            Partidos Generados
                        </dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-gray-900 dark:text-gray-200">
                                {{ $partidos }}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
