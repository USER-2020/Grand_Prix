<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    @include('team.partials.list-teams', ['teams' => $teams])
                    <x-primary-button><a href="{{ route('index.teams') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Add New Team</a></x-primary-button>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('team.partials.create-team-form', ['tournaments' => $tournaments, 'teams' => $teams])
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
