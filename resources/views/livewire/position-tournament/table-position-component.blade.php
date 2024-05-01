<div>
    <h2 class="text-xl font-bold mb-4 dark:text-gray-300">Ranking del torneo</h2>

    <div class="overflow-x-auto">
        <div class="min-w-full overflow-hidden rounded-lg shadow-xs">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Equipo
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Puntos
                        </th>
                        <!-- Puedes agregar más columnas aquí -->
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($teamRankings as $index => $teamRanking)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $teamRanking->team->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $teamRanking->points }}</div>
                            </td>
                            <!-- Puedes agregar más columnas aquí -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
