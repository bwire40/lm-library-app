<x-app-layout>
    <section class="relative my-10">

        <div class="w-full mx-auto px-4 sm:px-6 lg:px-0">
            @include('shared.success_message')
            @include('shared.error_messages')
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 sm:mx-10 md:mx-40 max-md:px-2 ">

                <div class="img p-2">
                    <div class="img-box h-full max-lg:mx-auto rounded-lg ">
                        <img src="{{ asset('images/' . $book->image) }}" alt="Yellow Tropical Printed Shirt image"
                            class="max-lg:mx-auto lg:ml-auto h-full rounded-lg">
                    </div>
                </div>
                <div
                    class="data w-full lg:pr-8 pr-0 xl:justify-start justify-center flex items-center max-lg:pb-10 xl:my-2 lg:my-5 my-0">
                    <div class="data w-full max-w-xl">
                        <p class="text-lg font-medium leading-8 text-indigo-600 mb-4"> <a
                                href="{{ route('books.index') }}">books</a>&nbsp; /&nbsp;
                            {{ $book->genre }}
                        </p>
                        <h2 class="font-manrope font-bold text-3xl leading-10 text-gray-900 mb-2 capitalize">
                            Title: {{ $book->title }}</h2>
                        <div class="flex flex-col sm:flex-row sm:items-center mb-6">


                        </div>

                        <p class="text-gray-500 text-base font-normal mb-5">
                            <span class="text-sm font-bold text-black leading-3">Written by: </span>
                            {{ $book->author }}
                        </p>
                        <p class="text-gray-500 text-base font-normal mb-5">
                            <span class="text-sm font-bold text-black leading-3">Published by: </span>
                            {{ $book->publisher }}
                        </p>
                        <p class="text-gray-500 text-base font-normal mb-5">
                            <span class="text-sm font-bold text-black leading-3">ISBN: </span>
                            {{ $book->isbn }}
                        </p>
                        <p class="text-gray-500 text-base font-normal mb-5">
                            <span class="text-sm font-bold text-black leading-3">Edition: </span>
                            {{ $book->edition }}
                        </p>


                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-8">
                            <!-- Modal toggle -->
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-center w-full px-5 py-4 rounded-[100px] bg-indigo-600 flex items-center justify-center font-semibold text-lg text-white shadow-sm transition-all duration-500 hover:bg-indigo-700 hover:shadow-indigo-400"
                                type="button">
                                Update
                            </button>

                            @include('books.includes.update')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
