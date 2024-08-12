<div class="max-w-3xl mx-auto my-5 px-4">
    <h1 class="text-3xl font-bold mb-4">Borrow this book</h1>

    <form id="borrow-form" action="{{ route('acquisition.store') }}" method="POST">
        @csrf

        <div class="flex flex-col justify-between md:flex-row sm:flex-col items-center mb-6">
            <div>
                <h2 id="modal-book-title" class="text-2xl font-semibold mb-2"></h2>
                <h2 id="modal-book-genre" class="text-2xl font-semibold mb-2"></h2>
                <p id="modal-book-author" class="text-gray-600 mb-4"></p>
            </div>
            <img id="modal-book-image" src="" alt="" class="w-48 h-32 object-cover rounded-lg shadow-lg">
        </div>

        <input type="hidden" id="book-id" name="book_id" value="">

        <div class="mb-4">
            <h3 class="text-xl font-semibold mb-4">Issue date</h3>
            <div class="flex items-center space-x-4">
                <input id="issue-date-picker" name="issue_date" class="flex-1 p-3 rounded-lg border border-gray-300"
                    placeholder="Select a date" type="text" />
                <button id="edit-issue-date"
                    class="px-4 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-400" type="button">Set
                    Issue Date</button>
            </div>
        </div>

        <div class="mb-5">
            <h3 class="text-xl font-semibold mb-4">User information</h3>

            <!-- Dropdown for Full name -->
            <select id="user-dropdown" name="user_id" class="w-full p-3 mb-4 rounded-lg border border-gray-300">
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
            <div class="flex items-center space-x-4">
                <input id="due-date-picker" name="due_date" class="flex-1 p-3 rounded-lg border border-gray-300"
                    placeholder="Select a date" type="text" />
                <button id="edit-due-date"
                    class="px-4 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-400" type="button">Set
                    Due Date</button>
            </div>
        </div>

        <button id="confirm-borrow" type="button" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">Confirm borrow</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const userDropdown = document.getElementById('user-dropdown');
    const emailInput = document.getElementById('user-email');
    const numberInput = document.getElementById('user-number');
    const bookIdInput = document.getElementById('book-id');
    const issueDateInput = document.getElementById('issue-date-picker');
    const dueDateInput = document.getElementById('due-date-picker');
    const confirmBorrowButton = document.getElementById('confirm-borrow');
    const borrowForm = document.getElementById('borrow-form');

    userDropdown.addEventListener('change', function() {
        const selectedOption = userDropdown.options[userDropdown.selectedIndex];
        const email = selectedOption.getAttribute('data-email');
        const number = selectedOption.getAttribute('data-number');
        emailInput.value = email;
        numberInput.value = number;
    });

    confirmBorrowButton.addEventListener('click', function() {
        const issueDate = issueDateInput.value;
        const dueDate = dueDateInput.value;
        const userId = userDropdown.value;
        const phoneNumber = numberInput.value;
        const email = emailInput.value;
        const bookId = bookIdInput.value;

        // Check if all required fields are filled
        if (!issueDate || !dueDate || !userId || !phoneNumber || !email) {
            alert('Please fill in all fields before submitting.');
            return;
        }

        // Submit the form if validation passes
        borrowForm.submit();
    });
});


    // Date Picker Initialization
    window.onload = function() {
        const issueDateInput = document.getElementById("issue-date-picker");
        const dueDateInput = document.getElementById("due-date-picker");
        const issueDatePickerButton = document.getElementById("edit-issue-date");
        const dueDatePickerButton = document.getElementById("edit-due-date");

        let currentDateInput = null;

        function initializeDatePicker(inputElement, onChangeCallback) {
            return flatpickr(inputElement, {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
                mode: 'single',
                clickOpens: false,
                onChange: onChangeCallback
            });
        }

        function updateDateInput(dateStr) {
            if (currentDateInput) {
                currentDateInput.value = dateStr;
            }
        }

        const issueDatePicker = initializeDatePicker(issueDateInput, (selectedDates, dateStr) => {
            updateDateInput(dateStr);
        });

        const dueDatePicker = initializeDatePicker(dueDateInput, (selectedDates, dateStr) => {
            updateDateInput(dateStr);
        });

        if (issueDatePickerButton) {
            issueDatePickerButton.addEventListener("click", () => {
                currentDateInput = issueDateInput;
                const issueDate = issueDateInput.value || new Date().toISOString().split('T')[0];
                issueDatePicker.setDate(issueDate, false);
                issueDatePicker.open();
            });
        }

        if (dueDatePickerButton) {
            dueDatePickerButton.addEventListener("click", () => {
                currentDateInput = dueDateInput;
                const dueDate = dueDateInput.value || '';
                dueDatePicker.setDate(dueDate, false);
                dueDatePicker.open();
            });
        }
    };
</script>
