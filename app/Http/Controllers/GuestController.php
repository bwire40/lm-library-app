<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $guests = Guest::all();
        return view("users.index", compact("guests"));
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
        //validate form input
        $validated = $request->validate([
            "name" => 'required|min:3|max:30',
            "email" => "required|email",
            "phone" => "required",
            "nationalId" => "required",
            "address" => "required|min:3|max:30"
        ]);

        // $guest = Guest::create($validated);
        $request->user()->guest()->create($validated);

        return redirect()->route("users.index")->with("success", "Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guest $guest)
    {
        //
        return view("users.edit", ["guest" => $guest]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
