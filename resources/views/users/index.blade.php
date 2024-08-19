<x-app-layout>
    <div class="px-10 py-10">

        @include('shared.success_message')
        @include('shared.error_messages')

        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            New User
        </button>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center
            w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-3xl max-h-full">
                <!-- Modal content -->
                <section class="bg-slate-50 shadow-2xl text-white dark:bg-gray-900 rounded-lg px-5">
                    <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-black dark:text-white">Add a new User</h2>
                        <form action="{{ route('guests.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                                <div class="sm:col-span-2">
                                    <label for="name" class="block mb-2   text-black dark:text-white">Full
                                        Name</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="eg. John Doe" required>

                                    @error('name')
                                        <p class="text-red-500 my-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="email" class="block mb-2   text-black dark:text-white">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="eg. example@mail.com" required>

                                    @error('email')
                                        <p class="text-red-500 my-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="nationalId" class="block mb-2   text-black dark:text-white">National
                                        Id</label>
                                    <input type="number" name="nationalId" id="nationalId"
                                        class="bg-gray-50 border border-gray-300 noscroll text-black
                                        rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="eg. 370XXXXXXX" required>

                                    @error('nationalId')
                                        <p class="text-red-500 my-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="address" class="block mb-2   text-black dark:text-white">Home
                                        Address</label>
                                    <input type="text" name="address" id="address"
                                        class="bg-gray-50 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="eg. 200-00100, kilimani">

                                    @error('address')
                                        <p class="text-red-500 my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block mb-2   text-black dark:text-white">Phone
                                        Number</label>
                                    <input type="number" name="phone" id="phone"
                                        class="bg-gray-50 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="736587412" required autocomplete="off">

                                    @error('phone')
                                        <p class="text-red-500 my-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6   text-center transition-all duration-300
                                text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-700">
                                Add user
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </div>

        <h2 class="mt-10 text-3xl ">Active Users</h2>
        <div class="flex flex-col mt-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-xs  leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    User Name</th>

                                <th
                                    class="px-6 py-3 text-xs  leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    National ID</th>
                                <th
                                    class="px-6 py-3 text-xs  leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Phone</th>
                                <th
                                    class="px-6 py-3 text-xs  leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Home Address</th>
                                <th
                                    class="px-6 py-3 text-xs  leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Status</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">


                            @foreach ($users as $user)
                                {{-- only display guest users --}}

                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h    -10">
                                                {{ $user->id }}
                                            </div>

                                            <div class="ml-4">
                                                <div class="  leading-5 text-black">
                                                    Name: {{ $user->name }}
                                                </div>
                                                <div class=" leading-5 text-gray-500">
                                                    Email: {{ $user->email }} </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{-- <div class=" leading-5 text-white">Software Engineer
                                    </div> --}}
                                        <div class=" leading-5 text-gray-500">
                                            {{ $user->nationalId }}
                                        </div>
                                    </td>
                                    <td
                                        class="px-6 py-4  leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        {{ $user->phone }}</td>
                                    <td
                                        class="px-6 py-4  leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        <div class=" leading-5 text-gray-800">{{ $user->address }}
                                        </div>
                                        {{-- <div class=" leading-5 text-gray-500">Kilimani Kenya</div> --}}
                                    </td>


                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if ($user->status == 'active')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">In
                                                active</span>
                                        @endif


                                    </td>


                                    <td
                                        class="px-6 flex justify-center items-center py-4   leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                        <a href="{{ route('guests.edit', $user->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>

                                        <form action="{{ secure_url(route('guests.destroy', $user->id)) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900">delete</button>
                                        </form>
                                        {{-- <a href="{{ route('users.destroy', $user->id) }}"
                                            class="text-red-600 hover:text-red-900">delete</a> --}}
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </div>
        </div>

        {{--
            <h2 class="mt-10 text-3xl ">In active Users</h2>
            <div class="flex flex-col mt-8"> --}}


    </div>
</x-app-layout>
