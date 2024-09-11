<x-app-layout>
    <section class="bg-white dark:bg-gray-900">


        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
            @include('shared.success_message')
            @include('shared.error_messages')
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update User Information</h2>
            <form action="{{ route('acquisition.update', $acquisition->id) }}" method="post"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                            Borrower Name</label>
                        <input type="text" name="name" id="name" value="{{ $acquisition->guest->name }}"
                            disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="eg. John Doe" required="">
                        @error('name')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book
                            Title</label>
                        <input type="text" name="email" id="email" value="{{ $acquisition->book->title }}"
                            disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" required="">
                        @error('email')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="book_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book
                            Code</label>
                        <input type="text" name="book_code" id="book_code" disabled
                            value="{{ $acquisition->book->book_code }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="eg. 370XXXXXXX" required="">
                        @error('book_code')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="issue_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                            Borrowed</label>
                        <input type="date" name="issue_date" id="issue_date" value="{{ $acquisition->issue_date }}"
                            disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="eg. 200-00100, kilimani" required="">
                        @error('issue_date')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    @php
                        // Define the two dates
                        $return_date = new DateTime($acquisition->return_date);
                        $due_date = new DateTime($acquisition->due_date);

                        // Calculate the difference
                        $interval = $return_date->diff($due_date);

                        $overdue = (int) $interval->format('%a');
                    @endphp
                    <div>
                        <label for="due_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due
                            Date</label>
                        <input type="date" name="due_date" id="due_date" value="{{ $acquisition->due_date }}"
                            disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="736587412" required="">

                        @if ($return_date >= $due_date)
                            <p class="text-red-500 font-bold my-2">
                                {{ 'The User is Overdue by ' . $overdue . ' day(s)' }}
                            </p>
                        @endif
                        @error('due_date')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <p class="text-slate-600">Update return date below</p>
                        <label for="return_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Return Date</label>
                        <input type="date" name="return_date" id="return_date"
                            value="{{ $acquisition->return_date }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="736587412" required="">
                        @error('return_date')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="return_date" class="block mb-2 text-md font-medium text-red-600 dark:text-white">Fee
                            charged</label>
                        @if ($return_date >= $due_date)
                            @if ($overdue > 10)
                                <p class="text-red-500 font-bold">{{ $overdue * 10 }} /=
                                </p>
                            @else
                                <p class="text-yellow-600 font-bold">
                                    {{ 0 }}
                                </p>
                            @endif
                        @else
                            <p class="text-green-600 font-bold">{{ '0 /=' }}
                            </p>
                        @endif
                        @error('return_date')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center transition-all duration-300
                    text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-700">
                    Update return date
                </button>

            </form>


            <div class="bg-white my-10 pb-10">
                <h2 class="text-xl font-bold my-3">Delete User</h2>
                <p> Once the user is deleted, all of its resources and data will be permanently deleted. Before
                    deleting your account, please download any data or information that you wish to retain.</p>

                <form action="{{ route('acquisition.destroy', $acquisition->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center transition-all duration-300
                        text-white bg-red-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-red-700">
                        Delete User Information
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>


<script>
    function handleClick() {
        confirm('Sure you want to delete user?')
    }
</script>
