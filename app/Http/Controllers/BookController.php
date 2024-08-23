<?php

namespace App\Http\Controllers;

use App\Models\Acquisition;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Book $book, Request $request)
    {

        $acquisition = Acquisition::orderBy("created_at", "desc")->paginate(20);
        // perform a books genre search
        $books = Book::orderBy("created_at", "desc");
        // chck if there is search
        if (request()->has('genre_search')) {
            $books = $books->where('genre', 'like', '%' . request()->get('genre_search', '') . '%');
        }

        // perform the book search type
        // check if there is a search
        if (request()->has('search_book')) {
            $books = $books->where('title', 'like', '%' . request()->get('search_book', '') . '%');
        }


        $genres = Genre::orderBy("genre", "asc")->get();

        $count = Book::count();
        $genre_count = Genre::count();


        return view("books.index", [
            "book" => $book,
            "genres" => $genres,
            "books" => $books->paginate(20),
            "count" => $count,
            "genre_count" => $genre_count,
            "acquisition" => $acquisition

        ]);
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
    public function store(Request $request, Book $book)
    {
        //
        $validated = $request->validate([
            "title" => "required|min:3",
            "book_code" => "required|min:3",
            "genre" => "required",
            "author" => "required|min:3",


        ]);

        $genre_id = Genre::where("genre", $validated["genre"])->first()->id;

        // check if book exists
        if (Book::where("id", "=", $book->id)->exists() && Book::where("title", "=", $validated["title"])->exists()) {
            return redirect()->back()->with('success', 'Book is already in the system');
        }
        // create the book
        $request->user()->book()->create([
            "title" => strtoupper($validated["title"]),
            "book_code" => $validated["book_code"],
            "genre" => $validated["genre"],
            "author" => strtoupper($validated["author"]),
            "genre_id" => $genre_id,


        ]);
        return redirect()->route("books.index")->with("success", "Book created Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        $genres = Genre::orderBy("genre", "asc")->get();
        $count = $book->count();
        return view("books.edit", [
            "book" => $book,
            "genres" => $genres,
            "count" => $count
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $validated = $request->validate([
            "title" => "required|min:3",
            "book_code" => "required|min:3",
            "genre" => "required",
            "author" => "required|min:3",

        ]);


        $genre_id = Genre::where("genre", $validated["genre"])->first()->id;
        // create the book
        $book->update([
            "title" => strtoupper($validated["title"]),
            "book_code" => $validated["book_code"],
            "genre" => $validated["genre"],
            "author" => strtoupper($validated["author"]),
            "genre_id" => $genre_id,

        ]);
        return redirect()->route("books.edit", $book)->with("success", "Book Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return redirect()->route("books.index")->with("success", "Book deleted Successfully!");
    }
}
