<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PDF Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    {{-- <h1>{{ $book->title }}</h1> --}}
    <p>This is a sample report file</p>

    <h2 class="text-3xl text-gray-700 font-bold">Recently Borrowed Books</h2>
    @if ($acquisitions->count() > 0)
        <div class="flex flex-col mt-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full" style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                        <thead style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                            <tr style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                <th style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                    #
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                    Guest Name</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                    Book Title</th>

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                    Book code</th>

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                    date Borrowed</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                    Due date</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                    Date Returned</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                    Overdue Days</th>

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                    Fees</th>

                            </tr>
                        </thead>

                        <tbody class="bg-white" style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                            @foreach ($acquisitions as $acquisition)
                                <tr style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                    <td style="border: 1px solid black; border-collapse:collapse; padding:8px;">#</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                        style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                        <div class="flex items-center justify-between">
                                            {{ $acquisition->guest->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                        style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                        <div class="flex items-center justify-between">
                                            {{ $acquisition->book->title }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                        style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                        <div class="text-sm leading-5 text-gray-500">

                                            {{ $acquisition->book->book_code }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200"
                                        style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                        <div class="text-sm leading-5 text-gray-500">
                                            {{ $acquisition->issue_date }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200"
                                        style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                        <div class="text-sm leading-5 text-gray-800">
                                            {{ $acquisition->due_date }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200"
                                        style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                        <div class="text-sm leading-5 text-gray-800">
                                            {{ $acquisition->return_date }}
                                        </div>
                                    </td>
                                    @php
                                        // Define the two dates
                                        $return_date = new DateTime($acquisition->return_date);
                                        $due_date = new DateTime($acquisition->due_date);

                                        // Calculate the difference
                                        $interval = $return_date->diff($due_date);

                                        $overdue = (int) $interval->format('%a');
                                    @endphp
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                        style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                        <div class="text-sm leading-5 text-gray-800">
                                            @if ($return_date >= $due_date)
                                                @if ($overdue > 10)
                                                    <p class="text-red-500 font-bold">{{ $overdue . ' day(s)' }}
                                                    </p>
                                                @else
                                                    <p class="text-yellow-600 font-bold">
                                                        {{ $overdue . ' day(s)' }}
                                                    </p>
                                                @endif
                                            @else
                                                <p class="text-green-600 font-bold">{{ '0 day(s)' }}
                                                </p>
                                            @endif

                                        </div>
                                    </td>

                                    {{-- fees --}}
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200"
                                        style="border: 1px solid black; border-collapse:collapse; padding:8px;">
                                        <div class="text-sm leading-5 text-gray-800">
                                            @if ($return_date >= $due_date)
                                                {{ $overdue * 10 }}
                                            @else
                                                {{ 0 * 10 }}
                                            @endif
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <p class="my-4 text-md">No books borrowed yet</p>
    @endif
</body>

</html>
