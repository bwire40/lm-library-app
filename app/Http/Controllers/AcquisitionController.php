<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Guest;
use App\Models\Book;
use App\Models\Acquisition;
use Illuminate\Http\Request;

class AcquisitionController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all genres
        $genres = Genre::all();
        // Fetch all guests that are active
        $guests = Guest::where('status', '=', 'active')->get();
        // Fetch all available books
        $books = Book::where('copies_number', '>', 0)->get();
        // If no genres exist, set $genres to null
        if ($genres->isEmpty()) {
            $genres = null;
        }
        // If no books exist, set $books to null
        if ($books->isEmpty()) {
            $books = null;
        }
        // If no books exist, set $books to null
        if ($guests->isEmpty()) {
            $guests = null;
        }

        //
        return view('acquisition.index', compact('genres', 'books', 'guests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Book $book) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            // 'user_id' => 'required|exists:guests,id',
            // 'book_id' => 'required|exists:books,book_code',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);

        // Create a new acquisition record
        Acquisition::create([
            // 'user_id' => $validatedData['user_id'],
            // 'book_code' => $validatedData['book_id'],
            'issue_date' => $validatedData['issue_date'],
            'due_date' => $validatedData['due_date'],
            'return_date' => $validatedData['return_date'] ?? null,
        ]);

        // Optionally, reduce the number of available copies in the Book model
        // $book = Book::where('book_code', $validatedData['book_id'])->first();
        // if ($book) {
        //     $book->decrement('copies_number');
        // }

        return redirect()->route('acquisition.index')->with('success', 'Book borrowed successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Acquisition $acquisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acquisition $acquisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acquisition $acquisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acquisition $acquisition)
    {
        //
    }
}
