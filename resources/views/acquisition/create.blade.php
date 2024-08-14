<div class="max-w-3xl mx-auto my-5 px-4">

    <h1 class="text-3xl font-bold mb-4">Borrow this book</h1>

    <form id="borrow-form" action="{{ route('acquisition.store') }}" method="POST">
        @csrf
        @method('post')

        <div class="flex flex-col justify-between md:flex-row sm:flex-col items-center mb-6">
            <div>
                <h2 class="text-2xl font-semibold mb-2">{{ $book->title }}</h2>
                <h2 class="text-2xl font-semibold mb-2">{{ $book->genre }}</h2>
                <p class="text-gray-600 mb-4">{{ $book->author }}</p>
            </div>
            <img src="{{ asset('images/' . $book->image) }}" alt=""
                class="w-48 h-32 object-cover rounded-lg shadow-lg">
        </div>

        <input type="hidden" name="book_id" value="{{ $book->id }}">

        <div class="mb-4">
            <h3 class="text-xl font-semibold mb-4">Issue date</h3>
            <input id="issue-date-" name="issue_date" class="flex-1 p-3 rounded-lg border border-gray-300"
                placeholder="Select a date" type="date" />
            @error('issue_date')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <h3 class="text-xl font-semibold mb-4">User information</h3>

            <!-- Dropdown for Full name -->
            <select id="user-dropdown" name="guest_id" class="w-full p-3 mb-4 rounded-lg border border-gray-300">
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
            <input id="user-email" name="email" type="email" placeholder="Email address"
                class="w-full p-3 mb-4 rounded-lg border border-gray-300" readonly>
            <!-- Phone number -->
            <input id="user-number" name="phone" type="text" placeholder="Phone number"
                class="w-full p-3 mb-4 rounded-lg border border-gray-300" readonly>
        </div>

        <div class="mb-4">
            <h3 class="text-xl font-semibold mb-4">Due date</h3>
            <input id="due-date-picker" name="due_date" class="flex-1 p-3 rounded-lg border border-gray-300"
                placeholder="Select a date" type="date" />
            @error('due_date')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
        </div>

        <button id="confirm-borrow" type="submit"
            class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">Confirm
            borrow</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userDropdown = document.getElementById('user-dropdown');
        const emailInput = document.getElementById('user-email');
        const numberInput = document.getElementById('user-number');

        userDropdown.addEventListener('change', function() {
            const selectedOption = userDropdown.options[userDropdown.selectedIndex];
            const email = selectedOption.getAttribute('data-email');
            const number = selectedOption.getAttribute('data-number');
            emailInput.value = email;
            numberInput.value = number;
        });

    });
</script>
