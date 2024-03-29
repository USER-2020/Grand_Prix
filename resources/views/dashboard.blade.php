<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    @include('partials-dashboard.list-tournament-info', ['tournaments' => $tournaments])
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    {{'Tus torneos inscritos'}}
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    {{'Actualizaciones'}}
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    {{'Cards de peronas registradas, cantidad de adminidistradores, jugadores registrados, torneos activos, etc... (Estadisticxa)'}}
                    @livewire('register-and-statics.registers-and-statics')
                </div>
            </div>

            
        </div>
    </div>
</x-app-layout>
