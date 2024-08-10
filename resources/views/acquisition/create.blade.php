<!-- Styles -->
<link href="{{ mix('css/app.css') }}" rel="stylesheet">

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>

<div class="max-w-3xl mx-auto my-8 px-4">
    <h1 class="text-3xl font-bold mb-4">Borrow this book</h1>
    <p class="text-gray-600 mb-6">Issue date: October 20, 2022</p>

    <div class="flex justify-between items-center mb-6">
        <div>
            <p class="text-gray-800">Genre: Fiction</p>
            <h2 class="text-2xl font-semibold mb-2">The Sound of the Ocean</h2>
            <p class="text-gray-600 mb-4">By Lisa H.</p>
        </div>
        <img src="https://yavuzceliker.github.io/sample-images/image-600.jpg" alt="Book Cover" class="w-48 h-32 object-cover rounded-lg shadow-lg">
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Your information</h3>

        <!-- Dropdown for Full name -->
        <select class="w-full p-3 mb-4 rounded-lg border border-gray-300">
            <option value="" disabled selected>Select your name</option>
            <option value="john_doe">John Doe</option>
            <option value="jane_doe">Jane Doe</option>
            <!-- Add more options as needed -->
        </select>

        <!-- Email address -->
        <input
            type="email"
            placeholder="Email address"
            class="w-full p-3 mb-4 rounded-lg border border-gray-300"
        >
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Due date</h3>

        <!-- Functional Date Picker -->
        <input
            id="due-date-picker"
            name="due_date"
            class="w-full p-3 rounded-lg border border-gray-300"
            placeholder="Select a date"
            type="text"
        />
    </div>

    <button class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
        Confirm borrow
    </button>
</div>
