<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Info tournament') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add information about tournament for all.') }}
        </p>
    </header>

    <form method="post" action="{{ route('store.tournament') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Room Size -->
        <div class="mt-4">
            <x-input-label for="room_size" :value="__('Room Size')" />
            <x-text-input id="room_size" name="room_size" type="text" class="mt-1 block w-full" :value="old('room_size')"
                required autocomplete="room_size" />
            <x-input-error class="mt-2" :messages="$errors->get('room_size')" />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="description" class="mt-1 block w-full" required>{{ old('description') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <!-- Date Start -->
        <div class="mt-4">
            <x-input-label for="date_start" :value="__('Date Start')" />
            <input id="date_start" name="date_start" type="date" class="mt-1 block w-full" :value="old('date_start')"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('date_start')" />
        </div>

        <!-- Date Close -->
        <div class="mt-4">
            <x-input-label for="date_close" :value="__('Date Close')" />
            <input id="date_close" name="date_close" type="date" class="mt-1 block w-full" :value="old('date_close')"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('date_close')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'tournament-create')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Tournament created.') }}</p>
            @endif
        </div>
    </form>
</section>
