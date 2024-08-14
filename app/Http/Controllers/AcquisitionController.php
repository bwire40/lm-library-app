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
    public function index(Request $request)
    {
        // Fetch all genres
        $genres = Genre::all();
        // Fetch all guests that are active
        $guests = Guest::where('status', '=', 'active')->get();
        // Initialize query for books
        $booksQuery = Book::where('copies_number', '>', 0);

        // Apply search filter
        if ($search = $request->input('search')) {
            $booksQuery->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%");
        }

        // Apply genre filter
        if ($genre = $request->input('genre')) {
            $booksQuery->where('genre', 'like', "%{$genre}%");
        }

        // Get the filtered books
        $books = $booksQuery->paginate(5);

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

        return view('acquisition.index', [
            'genres' => $genres,
            'books' => $books,
            'guests' => $guests,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Book $book) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'guest_id' => 'required',
            'book_id' => 'required',
            'issue_date' => 'required',
            'due_date' => 'required',

        ]);

        // Create a new acquisition record
        $request->user()->acquisition()->create([
            'guest_id' => $validatedData['guest_id'],
            'book_id' => $validatedData['book_id'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'issue_date' => $validatedData['issue_date'],
            'due_date' => $validatedData['due_date'],
        ]);

        // Reduce the number of available copies in the Book model
        $book = Book::where('id', $validatedData['book_id'])->first();
        if ($book) {
            $book->decrement('copies_number');
        }

        return redirect()->route('acquisition.index', compact('book'))->with('success', 'Book borrowed successfully!');
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
        $acquisition->delete();
        return redirect()->route('return.index')->with('success', 'Deleted Successfully!');
    }
}
