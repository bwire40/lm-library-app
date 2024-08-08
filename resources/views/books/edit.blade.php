<x-app-layout>
    <section class="relative my-10">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mx-auto max-md:px-2 ">
                <div class="img">
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
                            {{ $book->title }}</h2>
                        <div class="flex flex-col sm:flex-row sm:items-center mb-6">


                        </div>
                        <p class="text-gray-500 text-base font-normal mb-5">
                            <span class="text-sm font-bold text-black leading-3">Description...</span> <br> <br>
                            {{ $book->description }}
                        </p>

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
                            {{ $count }}
                        </p>


                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-8">

                            <button
                                class="text-center w-full px-5 py-4 rounded-[100px] bg-indigo-600 flex items-center justify-center font-semibold text-lg text-white shadow-sm transition-all duration-500 hover:bg-indigo-700 hover:shadow-indigo-400">
                                Edit Information
                            </button>
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
