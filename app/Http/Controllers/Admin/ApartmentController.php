<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apartments = Apartment::all();

        return view("admin.apartments.create", compact("apartments"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Inserts data validation
        $data = $request->validate([
            'title' => 'required',
            'rooms_number' => 'required',
            'beds_number' => 'required',
            'bathrooms_number' => 'required',
            'square_meters' => 'required',
            'address' => 'required',
            'thumbnail' => 'required',
            'visibility' => 'required',
        ]);

        // Create a new instance and save the data entered in the form
        $apartment = new Apartment();
        $apartment->fill($data);
        $apartment->save();

        return redirect()->route("admin.apartments.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $id)
    {
        $apartment = Apartment::findOrFail($id);

        return view("admin.apartments.edit", compact("apartment"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $id)
    {
        $apartment = Apartment::findOrFail($id);

        // Inserts data validation
        $data = $request->validate([
            'title' => 'required',
            'rooms_number' => 'required',
            'beds_number' => 'required',
            'bathrooms_number' => 'required',
            'square_meters' => 'required',
            'address' => 'required',
            'thumbnail' => 'required',
            'visibility' => 'required',
        ]);

        $apartment->update($data); // Update item data

        return redirect()->route("admin.apartments.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
