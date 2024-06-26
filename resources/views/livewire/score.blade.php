<div>
    <div>
        <div>
            @if ($sets)
                <select wire:model="selectedSet" wire:change="loadScores"
                    class="bg-gray-800 text-white rounded-lg px-4 py-2">
                    @foreach ($sets as $set)
                        <option value="{{ $set->id }}">{{ $set->name }}</option>
                    @endforeach
                </select>
            @else
                <p class="text-white">No hay conjuntos asociados a este partido.</p>
            @endif
        </div>
        <div class="flex justify-center mt-4 gap-4 ">
            <div class="w-full mx-4 bg-white-800 rounded-lg shadow-lg overflow-hidden dark:bg-gray-700">
                <div class="px-4 py-2 flex flex-col items-center">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200">{{ $teamA_name }}</h2>
                    <div class="flex flex-col items-center mt-4">
                        <div wire:keydown.enter="updateTeamAScore($event.target.innerText)"
                            wire:blur="updateTeamAScore($event.target.innerText)"
                            class="font-bold text-blue-300 dark:text-gray-200 text-6xl w-45 text-center bg-transparent border-none appearance-none"
                            style="font-size: 150px" contenteditable="true">{{ $teamAScore }}</div>
                        <div class="flex flex-col mt-2 w-full">
                            <x-primary-button wire:click="decreaseTeamAScore"
                                class="bg-blue-500 text-white px-6 py-3 rounded-lg mr-2 w-full text-center"
                                :disabled="$teamAScore == 0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                </svg></x-primary-button>
                            <x-primary-button wire:click="increaseTeamAScore"
                                class="bg-red-500 text-white px-6 py-3 rounded-lg w-full mt-2 text-center"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                </svg></x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mx-4 bg-white-800 rounded-lg shadow-lg overflow-hidden dark:bg-gray-700">
                <div class="px-4 py-2 flex flex-col items-center">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200">{{ $teamB_name }}</h2>
                    <div class="flex flex-col items-center mt-4">
                        <div wire:keydown.enter="updateTeamBScore($event.target.innerText)"
                            wire:blur="updateTeamBScore($event.target.innerText)"
                            class="font-bold text-red-300 dark:text-gray-200 text-6xl w-45 text-center bg-transparent border-none appearance-none"
                            style="font-size: 150px" contenteditable="true">{{ $teamBScore }}</div>
                        <div class="flex flex-col mt-2 w-full">
                            <x-primary-button wire:click="decreaseTeamBScore"
                                class="bg-red-500 text-white px-6 py-3 rounded-lg mr-2 w-full text-center font-semibold"
                                :disabled="$teamBScore == 0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                </svg></x-primary-button>
                            <x-primary-button wire:click="increaseTeamBScore"
                                class="bg-red-500 text-white px-6 py-3 rounded-lg w-full mt-2 text-center "><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                </svg></x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="flex justify-between">
            <div>
                {{--  <x-primary-button wire:click="changueFinishState">Finalizar partido</x-primary-button>  --}}
            </div>
            <div class="mt-4">
                <form wire:submit.prevent="updateRanking">
                    <label for="winner" class="text-gray-600 dark:text-gray-200">Selecciona el equipo ganador:</label>
                    <select wire:model="winner" id="winner" class="bg-gray-800 text-white rounded-lg px-4 py-2 mt-2">
                        <option value="">Selecciona un equipo</option>
                        <option value="{{ $teamA_id }}">{{ $teamA_name }}</option>
                        <option value="{{ $teamB_id }}">{{ $teamB_name }}</option>
                    </select>
                    <x-primary-button type="submit" class="mt-2">Actualizar Ranking</x-primary-button>
                </form>
            </div>
        </div>


    </div>


</div>
