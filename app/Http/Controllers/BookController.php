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
    public function index(Book $book)
    {

        $acquisition = Acquisition::orderBy("created_at", "desc")->paginate(5);
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


        $genres = Genre::all();

        $count = Book::count();
        $genre_count = Genre::count();

        return view("books.index", [
            "genres" => $genres,
            "books" => $books->paginate(5),
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
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "title" => "required|min:3",
            "book_code" => "required|min:3",
            "genre" => "required",
            "author" => "required|min:3",
            "image" => "required|image|mimes:png,jpg,jpeg,git|max:2048",
            "date_published" => "required",
            "description" => "required|min:3|max:1000",
            "copies_number" => "required",
        ]);

        // image
        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path("images"), $imageName);

        $genre_id = Genre::where("genre", $validated["genre"])->first()->id;

        // check if book exists
        if (Book::where("book_code", "=", $validated["book_code"])->exists()) {
            return redirect()->back()->with('success', 'Book is already in the system');
        }
        // create the book
        $request->user()->book()->create([
            "title" => $validated["title"],
            "book_code" => $validated["book_code"],
            "genre" => $validated["genre"],
            "author" => $validated["author"],
            "date_published" => $validated["date_published"],
            "description" => $validated["description"],
            "image" => $imageName,
            "genre_id" => $genre_id,
            "copies_number" => $validated["copies_number"],

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
        $genres = Genre::all();
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
            "date_published" => "required",
            "description" => "required|min:3|max:1000",
            "copies_number" => "required",
        ]);


        $genre_id = Genre::where("genre", $validated["genre"])->first()->id;
        // create the book
        $book->update([
            "title" => $validated["title"],
            "book_code" => $validated["book_code"],
            "genre" => $validated["genre"],
            "author" => $validated["author"],
            "date_published" => $validated["date_published"],
            "description" => $validated["description"],
            "genre_id" => $genre_id,
            "copies_number" => $validated["copies_number"],

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