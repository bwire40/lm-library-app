<button class="text-indigo-600 hover:text-indigo-900 mr-2" onclick="toggleModal()">Update Return</button>


{{-- modal content --}}
<div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75">

            </div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

        <form action="{{ route('acquisition.update', $acquisition->id) }}" method="post"
            class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            @csrf
            @method('put')
            <h1 class="mx-7 my-4 text-lg font-bold">Update Return</h1>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">


                {{-- <label for="return_date" class="block mb-2   text-black dark:text-white">Return date</label> --}}
                <p class="text-black my-4">Add guest book return date</p>
                <input type="date" name="return_date" id="return_date"
                    class="bg-gray-50 border border-gray-300 text-black  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="" required>

                @error('return_date')
                    <p class="text-red-500 my-2">{{ $message }}</p>
                @enderror


            </div>
            <div class="bg-gray-200 px-4 py-3 text-right">
                <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                    onclick="toggleModal()"><i class="fas fa-times"></i> Cancel</button>
                <button type="submit"
                    class="py-2 px-4 bg-blue-500 text-white rounded font-medium hover:bg-blue-700 mr-2 transition duration-500"><i
                        class="fas fa-plus"></i> Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal() {
        document.getElementById('modal').classList.toggle('hidden')
    }
</script>
