<?php

namespace App\Http\Controllers;

use App\Models\Acquisition;
use App\Models\Book;
use App\Models\Guest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Acquisition $acquisition, Book $book)
    {
        $users = Guest::orderBy("created_at", "asc")->paginate(5);
        $count = Guest::count();
        $acquisitions = Acquisition::orderBy("created_at", "asc")->paginate(5);
        // dump($count);
        return view("dashboard", compact("users", "count", "acquisition", "book", "acquisitions"));
    }
}
