<?php

namespace App\Http\Controllers;

use App\Models\ReturnBook;
use App\Http\Controllers\Controller;
use App\Models\Acquisition;
use App\Models\Guest;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReturnBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Acquisition $acquisition, Book $book)
    {

        // $overdueDays = $acquisition->overdue_days;

        $acquisitions = Acquisition::orderBy("created_at", "desc")->paginate(5);
        $guests=Guest::all();
        // dump($acquisition->issueDate);
        return view("returns.index", compact("acquisitions","book","guests"));
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