<!-- Modal toggle -->
<button data-modal-target="crud-modal-2" data-modal-toggle="crud-modal-2"
    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 w-fit md:mx-3
focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">
    Add Book Code
</button>


<!-- Main modal -->
<div id="crud-modal-2" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="relative p-4 w-full max-w-4xl max-h-full">

        <section class="bg-slate-50 shadow-2xl text-white dark:bg-gray-900 rounded-lg px-5">

            <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
                <h2 class="mb-1 text-xl font-bold text-black dark:text-white">Add Book Code</h2>
                <form action="{{ route('book-code.store') }}" method="post" enctype="multipart/form-data"
                    class="book-form">
                    @csrf
                    @method('post')
                    <h3 class="text-xl font-semibold mb-1">Book information</h3>
                    <div class="grid gap-2 sm:grid-cols-2 sm:gap-6">
                        <!-- image -->
                        <img alt="book image" class="book-image w-40 h-40 rounded-full border-4">
                        <div class="">
                            <label for="title"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Book Title</label>
                            <!-- Dropdown for Full name -->
                            <select name="book_id"
                                class="book-dropdown bg-slate-200 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Select Title</option>
                                @if ($books)
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}" data-genre="{{ $book->genre }}"
                                            data-author="{{ $book->author }}" data-isbn="{{ $book->isbn }}"
                                            data-year_of_publishing="{{ $book->year_of_publishing }}"
                                            data-publisher="{{ $book->publisher }}" data-edition="{{ $book->edition }}"
                                            data-image="{{ $book->image }}">
                                            {{ $book->title }}</option>
                                    @endforeach
                                @else
                                    <option value="">Add Title First</option>
                                @endif
                            </select>
                        </div>

                        <div class="w-full">
                            <label for="book_code"
                                class="block mb-1 text-sm font-medium text-green-800 dark:text-white">Add Book
                                Code</label>
                            <!-- book_code -->
                            <input id="book-book_code" name="book_code"
                                class="book-book_code w-full p-3 mb-1 rounded-lg border border-gray-300 text-black"
                                type="text" placeholder="book_code" required>
                        </div>

                        <div class="w-full">
                            <label for="genre"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                            <!-- genre -->
                            <input id="book-genre" name="genre"
                                class="book-genre w-full p-3 mb-1 rounded-lg border border-gray-300 text-black"
                                type="genre" placeholder="genre" readonly>
                        </div>
                        <div class="w-full">
                            <label for="author" class="block mb-1   text-black dark:text-white">Author</label>
                            <!-- author -->
                            <input id="book-author" name="author"
                                class="book-author w-full p-3 mb-1 rounded-lg border border-gray-300 text-black"
                                type="text" placeholder="Author" readonly>

                            @error('author')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="isbn" class="block mb-1   text-black dark:text-white">ISBN</label>
                            <!-- isbn -->
                            <input id="book-isbn" name="isbn"
                                class="book-isbn w-full p-3 mb-1 rounded-lg border border-gray-300 text-black"
                                type="text" placeholder="isbn" readonly>

                            @error('isbn')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="edition" class="block mb-1   text-black dark:text-white">Edition</label>
                            <!-- edition -->
                            <input id="book-edition" name="edition"
                                class="book-edition w-full p-3 mb-1 rounded-lg border border-gray-300 text-black"
                                type="text" placeholder="edition" readonly>
                            @error('edition')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="publisher" class="block mb-1   text-black dark:text-white">Publisher</label>
                            <!-- publisher -->
                            <input id="book-publisher" name="publisher"
                                class="book-publisher w-full p-3 mb-1 rounded-lg border border-gray-300 text-black"
                                type="text" placeholder="publisher" readonly>

                            @error('publisher')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="year_of_publishing" class="block mb-1   text-black dark:text-white">Year of
                                Publishing</label>
                            <!-- year_of_publishing -->
                            <input id="book-year_of_publishing" name="year_of_publishing"
                                class="book-year_of_publishing w-full p-3 mb-1 rounded-lg border border-gray-300 text-black"
                                type="text" placeholder="year_of_publishing" readonly>

                            @error('year_of_publishing')
                                <p class="text-red-500 my-2">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6   text-center transition-all duration-300
                    text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-700">
                        Add Code
                    </button>
                </form>
            </div>

        </section>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all forms
        const forms = document.querySelectorAll('.book-form');

        forms.forEach(form => {
            const bookDropdown = form.querySelector('.book-dropdown');
            const genreInput = form.querySelector('.book-genre');
            const authorInput = form.querySelector('.book-author');
            const isbnInput = form.querySelector('.book-isbn');
            const year_of_publishingInput = form.querySelector('.book-year_of_publishing');
            const publisherInput = form.querySelector('.book-publisher');
            const editionInput = form.querySelector('.book-edition');
            const imageInput = form.querySelector('.book-image');

            bookDropdown.addEventListener('change', function() {
                const selectedOption = bookDropdown.options[bookDropdown.selectedIndex];
                const genre = selectedOption.getAttribute('data-genre');
                const author = selectedOption.getAttribute('data-author');
                const isbn = selectedOption.getAttribute('data-isbn');
                const year_of_publishing = selectedOption.getAttribute(
                    'data-year_of_publishing');
                const publisher = selectedOption.getAttribute('data-publisher');
                const edition = selectedOption.getAttribute('data-edition');
                const image = selectedOption.getAttribute('data-image');
                genreInput.value = genre;
                authorInput.value = author;
                isbnInput.value = isbn;
                year_of_publishingInput.value = year_of_publishing;
                publisherInput.value = publisher;
                editionInput.value = edition;
                imageInput.src = "images/" + image;
            });
        });
    });
</script>
