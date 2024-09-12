<div class="max-w-3xl mx-auto my-5 px-4">
    <h1 class="text-3xl font-bold mb-4"></h1>

    <form class="borrow-form" action="{{ route('acquisition.store') }}" method="POST">
        @csrf
        @method('post')

        <div class="flex flex-col justify-around md:flex-row sm:flex-col items-center mb-6">
            <div>
                <h2 class="text-2xl font-semibold mb-2">{{ $book_code->book->title }}</h2>
                <h2 class="text-md text-blue-600 font-semibold mb-2">{{ $book_code->book->genre }}</h2>
                <p class="text-gray-600 mb-4">{{ $book_code->book->author }}</p>
            </div>

            <div>
                <img src="{{ asset('images/' . $book_code->book->image) }}" alt="" class=" w-60">
            </div>

        </div>

        <input type="hidden" name="book_id" value="{{ $book_code->book_id }}">
        <input type="hidden" name="book_code" value="{{ $book_code->book_code }}">

        <div class="mb-4">
            <h3 class="text-xl font-semibold mb-4">Issue date</h3>
            <input name="issue_date" class="flex-1 p-3 rounded-lg border border-gray-300" placeholder="Select a date"
                type="date" />
            @error('issue_date')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <h3 class="text-xl font-semibold mb-4">User information</h3>

            <!-- Dropdown for Full name -->
            <select name="guest_id" class="user-dropdown w-full p-3 mb-4 rounded-lg border border-gray-300">
                <option value="">Select users</option>
                @if ($guests)
                    @foreach ($guests as $guest)
                        <option value="{{ $guest->id }}" data-email="{{ $guest->email }}"
                            data-number="{{ $guest->phone }}">{{ $guest->name }}</option>
                    @endforeach
                @else
                    <option value="">Add users first</option>
                @endif
            </select>
            <!-- Email address -->
            <input id="user-email" name="email" class="user-email w-full p-3 mb-4 rounded-lg border border-gray-300"
                type="email" placeholder="Email address" readonly>
            <!-- Phone number -->
            <input id="user-number" name="phone" class="user-number w-full p-3 mb-4 rounded-lg border border-gray-300"
                type="text" placeholder="Phone number" readonly>
        </div>

        <div class="mb-4">
            <h3 class="text-xl font-semibold mb-4">Due date</h3>
            <input name="due_date" class="flex-1 p-3 rounded-lg border border-gray-300" placeholder="Select a date"
                type="date" />
            @error('due_date')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">Confirm
            borrow</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all forms
        const forms = document.querySelectorAll('.borrow-form');

        forms.forEach(form => {
            const userDropdown = form.querySelector('.user-dropdown');
            const emailInput = form.querySelector('.user-email');
            const numberInput = form.querySelector('.user-number');

            userDropdown.addEventListener('change', function() {
                const selectedOption = userDropdown.options[userDropdown.selectedIndex];
                const email = selectedOption.getAttribute('data-email');
                const number = selectedOption.getAttribute('data-number');
                emailInput.value = email;
                numberInput.value = number;
            });
        });
    });
</script>
