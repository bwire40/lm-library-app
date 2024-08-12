<x-app-layout>
    <section class="relative my-10">
        @include('shared.success_message')
        @include('shared.error_messages')
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mx-auto max-md:px-2 ">
                <div class="img p-2">
                    <div class="img-box h-full max-lg:mx-auto rounded-lg ">
                        <img src="{{ asset('images/' . $book->image) }}" alt="Yellow Tropical Printed Shirt image"
                            class="max-lg:mx-auto lg:ml-auto h-full rounded-lg">
                    </div>
                </div>
                <div
                    class="data w-full lg:pr-8 pr-0 xl:justify-start justify-center flex items-center max-lg:pb-10 xl:my-2 lg:my-5 my-0">
                    <div class="data w-full max-w-xl">
                        <p class="text-lg font-medium leading-8 text-indigo-600 mb-4">books&nbsp; /&nbsp;
                            {{ $book->genre }}
                        </p>
                        <h2 class="font-manrope font-bold text-3xl leading-10 text-gray-900 mb-2 capitalize">
                            Title: {{ $book->title }}</h2>
                        <div class="flex flex-col sm:flex-row sm:items-center mb-6">


                        </div>
                        <article class="text-gray-500 text-base font-normal mb-5">
                            <span class="text-sm font-bold text-black leading-3">Description...</span> <br> <br>
                            {{ $book->description }}
                        </article>

                        <p class="text-gray-500 text-base font-normal mb-5">
                            <span class="text-sm font-bold text-black leading-3">Written by: </span>
                            {{ $book->author }}
                        </p>
                        <p class="text-gray-500 text-base font-normal mb-5">
                            <span class="text-sm font-bold text-black leading-3">Date Published: </span>
                            {{ $book->date_published }}
                        </p>
                        <p class="text-gray-500 text-base font-normal mb-5">
                            <span class="text-sm font-bold text-black leading-3">Available Stock: </span>
                            {{ $book->copies_number }}
                        </p>


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

                                    <section class="bg-slate-50 shadow-2xl text-white dark:bg-gray-900 rounded-lg px-5">

                                        <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
                                            <h2 class="mb-4 text-xl font-bold text-black dark:text-white">Update Book
                                                Details
                                            </h2>
                                            <form action="{{ route('books.update', $book->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                                                    <div class="w-full">
                                                        <label for="title"
                                                            class="block mb-2   text-black dark:text-white">Book
                                                            Title</label>
                                                        <input type="text" name="title" id="title"
                                                            value="{{ $book->title }}"
                                                            class="bg-gray-200 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="eg. John Doe" required>

                                                        @error('title')
                                                            <p class="text-red-500 my-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="book_code"
                                                            class="block mb-2   text-black dark:text-white">
                                                            Book Code</label>
                                                        <input type="text" name="book_code" id="book_code"
                                                            value="{{ $book->book_code }}"
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
                                                        <label for="author"
                                                            class="block mb-2   text-black dark:text-white">Author</label>
                                                        <input type="text" name="author" id="author"
                                                            value="{{ $book->author }}"
                                                            class="bg-gray-200 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="eg. Arome Osayi" required>

                                                        @error('author')
                                                            <p class="text-red-500 my-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="date_published"
                                                            class="block mb-2   text-black dark:text-white">Date
                                                            Published</label>
                                                        <input type="date" name="date_published" id="date_published"
                                                            value="{{ $book->date_published }}"
                                                            class="bg-gray-200 border border-gray-300 disableFuturedate noscroll text-slate-600  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="eg. 20-jul-2022" required>

                                                        @error('date_published')
                                                            <p class="text-red-500 my-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="copies_number"
                                                            class="block mb-2   text-black dark:text-white">Number of
                                                            copies</label>
                                                        <input type="number" name="copies_number" id="copies_number"
                                                            value="{{ $book->copies_number }}"
                                                            class="bg-gray-200 border border-gray-300 noscroll text-slate-600  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="eg. 200" required>

                                                        @error('copies_number')
                                                            <p class="text-red-500 my-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="w-full">
                                                    <label for="address"
                                                        class="block mb-2  my-2 text-black dark:text-white">Book
                                                        Description</label>
                                                    <textarea
                                                        class="bg-gray-200 border border-gray-300 text-slate-600  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        name="description" id="decription" cols="30" rows="10">
                                                    {{ $book->description }}
                                                    </textarea>

                                                    @error('address')
                                                        <p class="text-red-500 my-2">{{ $message }}</p>
                                                    @enderror
                                                </div> <button type="submit"
                                                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6   text-center transition-all duration-300
                                text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-700">
                                                    Update
                                                </button>
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <button
                                class="group py-4 px-5 rounded-full bg-indigo-50 text-indigo-600 font-semibold text-lg w-full flex items-center justify-center gap-2 transition-all duration-500 hover:bg-indigo-100">
                                <svg class="stroke-indigo-600 " width="22" height="22" viewBox="0 0 22 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.7394 17.875C10.7394 18.6344 10.1062 19.25 9.32511 19.25C8.54402 19.25 7.91083 18.6344 7.91083 17.875M16.3965 17.875C16.3965 18.6344 15.7633 19.25 14.9823 19.25C14.2012 19.25 13.568 18.6344 13.568 17.875M4.1394 5.5L5.46568 12.5908C5.73339 14.0221 5.86724 14.7377 6.37649 15.1605C6.88573 15.5833 7.61377 15.5833 9.06984 15.5833H15.2379C16.6941 15.5833 17.4222 15.5833 17.9314 15.1605C18.4407 14.7376 18.5745 14.0219 18.8421 12.5906L19.3564 9.84059C19.7324 7.82973 19.9203 6.8243 19.3705 6.16215C18.8207 5.5 17.7979 5.5 15.7522 5.5H4.1394ZM4.1394 5.5L3.66797 2.75"
                                        stroke="" stroke-width="1.6" stroke-linecap="round" />
                                </svg>
                                Requeust book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
