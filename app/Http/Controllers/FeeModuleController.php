<?php

namespace App\Http\Controllers;

use App\Models\FeeModule;
use Illuminate\Http\Request;

class FeeModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("fees.index");
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
    public function show(FeeModule $feeModule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeeModule $feeModule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeeModule $feeModule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeModule $feeModule)
    {
        //
    }
}
