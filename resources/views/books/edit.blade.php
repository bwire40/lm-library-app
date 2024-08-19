<x-app-layout>
    <section class="relative my-10">
        @include('shared.success_message')
        @include('shared.error_messages')
        <div class="w-full mx-auto overflow-hidden mt-10 md:mt-20  sm:px-6 lg:px-20">
            <div class="data w-full mx-auto max-w-7xl h-screen">
                {{-- update form --}}
                <section class="bg-slate-50 text-white dark:bg-gray-900 rounded-lg px-5 w-full">

                    <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-black dark:text-white">Update Book
                            Details
                        </h2>
                        <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
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



                            </div>

                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6   text-center transition-all duration-300
                    text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-700">
                                Update
                            </button>
                        </form>
                    </div>
                </section>

                {{--
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-8">
                            <!-- Modal toggle -->
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-center w-full px-5 py-4 rounded-[100px] bg-indigo-600 flex items-center justify-center font-semibold text-lg text-white shadow-sm transition-all duration-500 hover:bg-indigo-700 hover:shadow-indigo-400"
                                type="button">
                                Update Information
                            </button>

                            <!-- Main modal -->
                            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

                                <div class="relative p-4 w-full max-w-4xl max-h-full">


                                </div>
                            </div>

                        </div> --}}
            </div>
        </div>
    </section>

</x-app-layout>
