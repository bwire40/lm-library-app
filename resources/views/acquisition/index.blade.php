<x-app-layout>

    <div class="max-w-4xl mx-auto mt-4 mb-4 px-4">

        @include('shared.error_messages')
        @include('shared.success_message')
        <h1 class="text-3xl font-bold mb-6">Borrow Books</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('acquisition.index') }}" class="mb-6">
            <div class="relative mb-4">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search for a title or author"
                    class="w-full p-3 pl-10 rounded-xl border border-gray-300">
                <!-- Search Icon -->
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35m1.29-5.35A7.5 7.5 0 1110.5 3 7.5 7.5 0 0118 10.5z" />
                </svg>
            </div>
        </form>

        <!-- Genre Filter Form -->
        <form method="GET" action="{{ route('acquisition.index') }}" class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Refine by Genre</h2>
            @if ($genres)
                <div class="flex flex-wrap gap-2">
                    @foreach ($genres as $genre)
                        <button type="submit" name="genre" value="{{ $genre->genre }}"
                            class="px-4 py-2 {{ request('genre') === $genre->genre ? 'bg-gray-600 text-white' : 'bg-blue-600 text-white' }} rounded-full hover:bg-gray-600">
                            {{ $genre->genre }}
                        </button>
                    @endforeach
                    <!-- Clear Genre Filter Button -->
                    <button type="submit" name="genre" value=""
                        class="px-4 py-2 {{ request('genre') === '' ? 'bg-gray-600 text-white' : 'bg-blue-800 text-white' }} rounded-full hover:bg-gray-600">
                        Clear Genre Filter
                    </button>
                </div>
            @else
                <p class="text-gray-600">No genres available.</p>
            @endif
        </form>

        <!-- Book Listing -->
        <div>
            @if ($books->count() > 0)
                @foreach ($books as $book)
                    <div class="flex items-center justify-between bg-white p-4 rounded-lg shadow mb-4">
                        <div class="flex items-center">
                            <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}"
                                class="w-12 h-16 object-cover rounded mr-4">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
                                <p class="text-gray-600">By: {{ $book->author }}</p>
                            </div>
                        </div>

                        <!-- Acquisition Modal Trigger -->
                        <x-acquisition-modal>
                            <x-slot name="trigger">
                                <button
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 acquisition-borrow-button">
                                    Borrow
                                </button>
                            </x-slot>

                            <!-- Modal Content -->
                            @include('acquisition.create')
                        </x-acquisition-modal>
                    </div>
                @endforeach
            @else
                <p class="text-gray-600">No books available.</p>
            @endif
        </div>
    </div>
</x-app-layout>
