<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
    class="block my-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 w-fit md:mx-3
focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-10 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">
    Add new Book
</button>

<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center
items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">


    <div class="relative p-4 w-full max-w-4xl max-h-full">

        <section class="bg-slate-50 shadow-2xl text-white dark:bg-gray-900 rounded-lg px-5">

            <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-black dark:text-white">Add Book</h2>
                <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
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
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                            dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="eg. Faith" required>

                            @error('title')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="book_code" class="block mb-2   text-black dark:text-white">
                                Book Code</label>
                            <input type="text" name="book_code" id="book_code"
                                class="bg-gray-50 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
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
                                <option selected="">Select genre</option>


                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->genre }}">{{ $genre->genre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="author" class="block mb-2   text-black dark:text-white">Author</label>
                            <input type="text" name="author" id="author"
                                class="bg-gray-50 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="eg. Arome Osayi" required>

                            @error('author')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="date_published" class="block mb-2   text-black dark:text-white">Date
                                Published</label>
                            <input type="date" name="date_published" id="date_published"
                                class="bg-gray-50 border border-gray-300 disableFuturedate noscroll text-slate-600  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="eg. 20-jul-2022" required>

                            @error('date_published')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="copies_number" class="block mb-2   text-black dark:text-white">Number of
                                copies</label>
                            <input type="number" name="copies_number" id="copies_number"
                                class="bg-gray-50 border border-gray-300 noscroll text-slate-600  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="eg. 200" required>

                            @error('copies_number')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="w-full">
                        <label for="address" class="block mb-2  my-2 text-black dark:text-white">Book
                            Description</label>
                        <textarea
                            class="bg-gray-50 border border-gray-300 text-slate-600  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            name="description" id="decription" cols="30" rows="6"></textarea>

                        @error('address')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div> <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6   text-center transition-all duration-300
                    text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-700">
                        Add Book
                    </button>
                </form>
            </div>
        </section>
    </div>
</div>
