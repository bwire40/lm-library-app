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
        $users = Guest::orderBy("created_at", "desc")->paginate(5);
        $count = Guest::count();
        // dump($count);
        return view("dashboard", compact("users", "count", "acquisition", "book"));
    }
}
