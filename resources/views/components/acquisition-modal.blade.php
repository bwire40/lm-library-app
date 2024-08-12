<div x-data="{ open: false }" @keydown.escape="open = false">
    <!-- Trigger -->
    <div @click="open = true">
        {{ $trigger }}
    </div>

    <!-- Modal Background -->
    <div x-show="open" class="fixed inset-0 flex items-start py-10 overflow-y-auto px-2 justify-center z-50"
        style="background-color: rgba(0, 0, 0, 0.5);  display: none;">
        <!-- Modal Content -->
        <div @click.away="open = false" class="bg-white rounded-lg shadow-lg w-full max-w-3xl mx-auto p-6" x-show="open"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90">
            <!-- Modal Close Button -->
            <button @click="open = false" class="absolute top-0 right-0 mt-4 mr-4 text-gray-600 hover:text-gray-900">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Modal Body -->
            <div>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
