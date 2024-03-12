<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Manage team') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add information about teams belong for all.') }}
        </p>
    </header>
    <div class="py-12">
        @livewire('user-selection')
    </div>
</section>