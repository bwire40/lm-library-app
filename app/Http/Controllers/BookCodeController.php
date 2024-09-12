<?php

namespace App\Http\Controllers;

use App\Models\BookCode;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::all();
        return view("book_code.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, BookCode $bookCode)
    {
        //
        // Validate the request data
        $validatedData = $request->validate([
            'book_id' => 'required',
            'book_code' => 'required',

        ]);

        // check if book code exists
        if (BookCode::where('book_code', '=', $validatedData["book_code"])->exists()) {
            return redirect()->back()->with("error", "Book code is already in the system");
        } else {
            BookCode::create($validatedData);
        }



        return redirect()->route('books.index')->with('success', 'Book Code added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookCode $bookCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCode $bookCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookCode $bookCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCode $bookCode)
    {
        //
    }
}
