<div class="container flex-grow w-full sm:py-16 mx-auto px-0">
    <h1 class="text-center text-3xl mb-4 uppercase bg-white text-gray-700 mx-auto px-2">
        Book collections
    </h1>
    <div class="mx-auto w-full px-4">
        <div class="container my-8">
            <div class="flex justify-between items-center mb-4">
            </div>
            <div id="scrollContainer" class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8">


                @if ($book->count() > 0)
                    {{-- for each book --}}
                    @foreach ($books as $book)
                        <div class="flex-none w-2/3 md:w-1/3 mr-8 md:pb-4 rounded-lg">
                            <a href="{{ route('books.edit', $book->id) }}" class="space-y-4">
                                <div class="aspect-w-16 aspect-h-9">
                                    <img class="object-cover shadow-md hover:shadow-xl rounded-lg w-96 h-96"
                                        src="{{ asset('images/' . $book->image) }}" alt="" />
                                </div>
                                <div class="px-4 py-2">
                                    <div class="text-lg leading-6 font-medium space-y-1">
                                        <h3 class="font-bold text-gray-800 text-3xl mb-2">
                                            {{ $book->title }}
                                        </h3>
                                    </div>
                                    <div class="text-lg">
                                        <p class="">
                                            by: {{ $book->author }}
                                        </p>
                                        <p class="font-medium text-sm text-indigo-600 mt-2">
                                            Read more<span class="text-indigo-600">&hellip;</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </div>
</div>
