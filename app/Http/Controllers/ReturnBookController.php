<?php

namespace App\Http\Controllers;

use App\Models\ReturnBook;
use App\Http\Controllers\Controller;
use App\Models\Acquisition;
use App\Models\Guest;
use App\Models\Book;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class ReturnBookController extends Controller
{


    public function generatePDF(Acquisition $acquisition, Request $request, Book $book)
    {
        $acquisitions = Acquisition::orderBy("created_at", "asc")->paginate(5);
        $books = Book::orderBy("created_at", "asc");
        $guests = Guest::all();
        // Load a view to be converted into a PDF
        $pdf = PDF::loadView('returns.pdf', compact("acquisitions", "book", "guests", "books", "acquisition")); // 'pdf.example' is a Blade view file

        // Optionally, you can pass data to the view
        // $data = ['key' => 'value'];
        // $pdf = PDF::loadView('returns.pdf', $data);

        // Save the PDF to a file (optional)
        $pdf->save(storage_path('app/public/example.pdf'));

        // Return the PDF as a response
        return $pdf->download('acquisition_report.pdf');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Acquisition $acquisition, Book $book)
    {


        $books = Book::orderBy("created_at", "desc");
        // check if there is a search
        if (request()->has('search_book')) {
            $books = $books->where('title', 'like', '%' . request()->get('search_book', '') . '%');
        }

        $acquisitions = Acquisition::orderBy("created_at", "desc")->paginate(5);
        $guests = Guest::all();
        // dump($acquisition->issueDate);
        return view("returns.index", compact("acquisitions", "book", "guests", "books", "acquisition"));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(ReturnBook $returnBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReturnBook $returnBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReturnBook $returnBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReturnBook $returnBook, Acquisition $acquisition)
    {
        //

    }
}
