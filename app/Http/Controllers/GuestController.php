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
        $guests = Guest::orderBy("created_at", "desc")->paginate(5);
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
            "image" => "required|image|mimes:png,jpg,jpeg,gif|max:2048",
            "name" => 'required|min:3|max:30',
            "email" => "required|email",
            "phone" => "required",
            "nationalId" => "required",
            "address" => "required|min:3|max:30"
        ]);


        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        if (Guest::where('email', '=', $validated["email"])->exists()) {
            // dump($user);
            return redirect()->back()->with('success', 'User with the email provided is already in the system');
        } else if (Guest::where('phone', '=', $validated["phone"])->exists()) {

            return redirect()->back()->with('success', 'User with the phone number is already in the system');
        } else if (Guest::where('nationalId', '=', $validated["nationalId"])->exists()) {

            return redirect()->back()->with('success', 'User with the National Id is already in the system');
        } else {
            $request->user()->guest()->create([
                "name" => $validated["name"],
                "email" => $validated["email"],
                "phone" => $validated["phone"],
                "address" => $validated["address"],
                "nationalId" => $validated["nationalId"],
                "image" => $imageName,
            ]);
        }


        // dump($imageName);
        return redirect()->route("users.index")->with("success", "User Created Successfully");
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
        //validate form input
        $validated = $request->validate([
            "image" => "required|image|mimes:png,jpg,jpeg,gif|max:2048",
            "name" => 'required|min:3|max:30',
            "email" => "required|email",
            "phone" => "required",
            "nationalId" => "required",
            "address" => "required|min:3|max:30",
            "status" => "required"
        ]);


        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        $guest->update([
            "image" => $imageName,
            "name" => $validated["name"],
            "email" => $validated["email"],
            "phone" => $validated["phone"],
            "address" => $validated["address"],
            "nationalId" => $validated["nationalId"],
            "status" => $validated["status"],

        ]);

        return redirect()->route("guests.edit", $guest->id)->with("success", "User Updated Successfully");
    }
    // update status
    public function changeStatus(Request $request, Guest $guest)
    {
        if (Guest::where('status', '=', 'active')) {
            $guest->update([
                "status" => "inactive"
            ]);
        } elseif (Guest::where('status', '=', 'inactive')) {
            $guest->update([
                "status" => "active"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        //
        $guest->delete();
        return redirect()->route("users.index")->with("success", "User deleted Successfully!");
    }
}