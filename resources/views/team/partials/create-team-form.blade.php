<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Info teams') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add information about teams belong for all.') }}
        </p>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form action="{{ route('store.teams') }}" method="POST">
                    @csrf
                    @method('post')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Nombre
                            del Equipo</label>
                        <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full"
                            required />
                    </div>
                    
                    

                    <div class="flex items-center justify-end">
                        <x-primary-button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Crear Equipo</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
