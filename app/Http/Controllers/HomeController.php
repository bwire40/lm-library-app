<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $users = Guest::orderBy("created_at", "desc")->paginate(5);
        $count = Guest::count();
        // dump($count);
        return view("dashboard", compact("users", "count"));
    }
}
