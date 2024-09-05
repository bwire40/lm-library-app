<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="relative p-4 w-full max-w-4xl max-h-full">

        <section class="bg-slate-50 shadow-2xl text-white dark:bg-gray-900 rounded-lg px-5">

            <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-black dark:text-white">Update Book
                    Details
                </h2>
                <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h2 class="block mb-2  text-black dark:text-white">Book Image</h2>
                    <div class="flex items-center justify-center w-full py-4">

                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed
                        rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100
                        dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2  text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                        to
                                        upload profile image</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" name="image" class="text-black lg:block"
                                multiple />
                        </label>
                        @error('image')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                        <div class="w-full">
                            <label for="title" class="block mb-2   text-black dark:text-white">Book
                                Title</label>
                            <input type="text" name="title" id="title" value="{{ $book->title }}"
                                class="bg-gray-200 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
        dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="eg. John Doe" required>

                            @error('title')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="book_code" class="block mb-2   text-black dark:text-white">
                                Book Code</label>
                            <input type="text" name="book_code" id="book_code" value="{{ $book->book_code }}"
                                class="bg-gray-200 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
        dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="eg. CCDXXX" required>

                            @error('book_code')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="genre"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                            <select name="genre" id="genre"
                                class="bg-slate-200 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="{{ $book->genre }}" selected>
                                    {{ $book->genre }}</option>

                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->genre }}">
                                        {{ $genre->genre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="author" class="block mb-2   text-black dark:text-white">Author</label>
                            <input type="text" name="author" id="author" value="{{ $book->author }}"
                                class="bg-gray-200 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="eg. Arome Osayi" required>

                            @error('author')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="isbn" class="block mb-2   text-black dark:text-white">ISBN</label>
                            <input type="text" name="isbn" id="isbn" value="{{ $book->isbn }}"
                                class="bg-gray-200 border border-gray-300 noscroll text-slate-600  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="" required>

                            @error('isbn')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="edition" class="block mb-2   text-black dark:text-white">Edition</label>
                            <input type="text" name="edition" id="edition" value="{{ $book->edition }}"
                                class="bg-gray-200 border border-gray-300 noscroll text-slate-600  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="" required>

                            @error('edition')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="publisher" class="block mb-2   text-black dark:text-white">Publisher</label>
                            <input type="text" name="publisher" id="publisher" value="{{ $book->publisher }}"
                                class="bg-gray-200 border border-gray-300 noscroll text-slate-600  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="" required>

                            @error('publisher')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="year_of_publishing"
                                class="block mb-2   text-black dark:text-white">Year_of_Publishing</label>
                            <input type="number" name="year_of_publishing" id="year_of_publishing"
                                value="{{ $book->year_of_publishing }}"
                                class="bg-gray-200 border border-gray-300 noscroll text-slate-600  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="eg. 200" required>

                            @error('year_of_publishing')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6   text-center transition-all duration-300
text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-700">
                        Update
                    </button>
                </form>
            </div>
        </section>
    </div>
</div>
