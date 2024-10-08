<x-app-layout>
    <section class="bg-white dark:bg-gray-900">


        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
            @include('shared.success_message')
            @include('shared.error_messages')
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update User Information</h2>
            <form action="{{ route('guests.update', $guest->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">




                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                            Name</label>
                        <input type="text" name="name" id="name" value="{{ $guest->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="eg. John Doe" required="">
                        @error('name')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" value="{{ $guest->email }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="eg. example@mail.com" required="">
                        @error('email')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="nationalid"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">National Id</label>
                        <input type="number" name="nationalId" id="nationalId" value="{{ $guest->nationalId }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="eg. 370XXXXXXX" required="">
                        @error('nationalId')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home
                            Address</label>
                        <input type="text" name="address" id="address" value="{{ $guest->address }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="eg. 200-00100, kilimani" required="">
                        @error('address')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                            Number</label>
                        <input type="number" name="phone" id="phone" value="{{ $guest->phone }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="736587412" required="">
                        @error('phone')
                            <p class="text-red-500 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Your description here"></textarea>
                    </div> --}}
                    <div>
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select name="status" id="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="{{ $guest->status }}">{{ $guest->status }}</option>
                            @if ($guest->status == 'active')
                                <option value="inactive">In active</option>
                            @else
                                <option value="active">Active</option>
                            @endif


                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center transition-all duration-300
                    text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-700">
                    Update User Information
                </button>

            </form>


            <div class="bg-white shadow-md my-10 pb-10">
                <h2 class="text-xl font-bold my-3">Delete User</h2>
                <p> Once the user is deleted, all of its resources and data will be permanently deleted. Before
                    deleting your account, please download any data or information that you wish to retain.</p>

                <form action="{{ route('guests.destroy', $guest->id) }}" method="post">
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
