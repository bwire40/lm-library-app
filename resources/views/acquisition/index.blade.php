<x-app-layout>
    <div class="max-w-4xl mx-auto mt-4 mb-4 px-4">
        <h1 class="text-3xl font-bold mb-6">Borrow eBooks & Audiobooks</h1>

        <!-- Search bar with corner radius and icon -->
        <div class="relative mb-6">
            <input type="text" placeholder="Search for a title, author, or topic"
                class="w-full p-3 pl-10 rounded-xl border border-gray-300">
            <!-- Search icon -->
            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35m1.29-5.35A7.5 7.5 0 1110.5 3 7.5 7.5 0 0118 10.5z" />
            </svg>
        </div>

        <!-- Refine by section -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Refine by</h2>

            <!-- Genre buttons -->
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach (['Fiction', 'Nonfiction', 'Mystery', 'Romance', 'History', 'Fantasy', 'Biography', 'Science Fiction', 'Thriller', 'Young Adult'] as $genre)
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-gray-300 hover:text-black">
                        {{ $genre }}
                    </button>
                @endforeach
            </div>

        </div>

        <div>
            @foreach ([['title' => 'A Promised Land', 'author' => 'Barack Obama', 'image' => ' https://yavuzceliker.github.io/sample-images/image-12.jpg'], ['title' => 'Becoming', 'author' => 'Michelle Obama', 'image' => ' https://yavuzceliker.github.io/sample-images/image-14.jpg'], ['title' => 'Where the Crawdads Sing', 'author' => 'Delia Owens', 'image' => ' https://yavuzceliker.github.io/sample-images/image-16.jpg'], ['title' => 'Little Fires Everywhere', 'author' => 'Celeste Ng', 'image' => ' https://yavuzceliker.github.io/sample-images/image-18.jpg'], ['title' => 'Educated', 'author' => 'Tara Westover', 'image' => ' https://yavuzceliker.github.io/sample-images/image-20.jpg']] as $book)
                <div class="flex items-center justify-between bg-white p-4 rounded-lg shadow mb-4">
                    <div class="flex items-center">
                        <img src="{{ $book['image'] }}" alt="{{ $book['title'] }}"
                            class="w-12 h-16 object-cover rounded mr-4">
                        <div>
                            <h3 class="text-lg font-semibold">{{ $book['title'] }}</h3>
                            <p class="text-gray-600">By: {{ $book['author'] }}</p>
                        </div>
                    </div>

                    <!-- Acquisition Modal Trigger -->
                    <x-acquisition-modal>
                        <x-slot name="trigger">
                            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Borrow
                            </button>
                        </x-slot>

                        <!-- Modal Content -->
                        @include('acquisition.create')
                    </x-acquisition-modal>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
