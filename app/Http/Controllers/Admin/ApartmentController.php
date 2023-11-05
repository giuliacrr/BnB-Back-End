<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentsStoreRequest;
use App\Http\Requests\ApartmentsUpdateRequest;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApartmentController extends Controller
{
    // Function that generates a unique slug
    private function createSlug($title)
    {
        $counter = 0;
        do {
            $slug = Str::slug($title); // create a slug

            // If the counter is greater than 0 concatenate the value of "counter" to the slug
            if ($counter > 0) {
                $slug = $slug . "-" . $counter;
            }

            $slugAlreadyExists = Apartment::where("slug", $slug)->first(); // checks if an element with the same slug exists
            $counter++;
        } while ($slugAlreadyExists);

        return $slug;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();   //trovo l'utente loggato
        $apartments = $user->apartments;    //trovo gli appartamenti caricati dall'utente loggato
        return view('admin.apartments.index', compact("apartments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apartments = Apartment::all();
        $services = Service::all();

        return view("admin.apartments.create", compact("apartments", "services"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApartmentsStoreRequest $request)
    {
        // Inserts data validation
        $data = $request->validated();

        // Call the function to generate a unique slug
        $data["slug"] = $this->createSlug($data["title"]);

        // Save the image within the filesystem in the apartments folder
        $data["thumbnail"] = Storage::put("apartments", $data["thumbnail"]);

        // Save current user
        $currentUser = Auth::user();
        $data["user_id"] = $currentUser->id;

        // Inserts a default value for longitude and latitude
        $data['latitude'] = 0.0;
        $data['longitude'] = 0.0;

        // Create a new instance and save the data entered in the form
        $apartment = new Apartment();
        $apartment->fill($data);
        $apartment->save();

        // Check if I have the "services" key in the form sent
        if (key_exists("services", $data)) {
            // Manually assign the technology array
            $apartment->services()->attach($data["services"]); // accesses the relation and invokes the attach method
        }

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
    public function edit($slug)
    {
        $apartment = Apartment::where('slug', $slug)->firstOrFail();    //Trovo l'appartamento corrispondente alla slug
        $services = Service::all(); //Trovo tutti i servizi

        //Se l'appartamento trovato non appartiene all'utente loggato ritorno all'index
        if($apartment->user_id !== Auth::id()){
            // return redirect()->route("admin.apartments.index");
            return abort(404);
        }

        return view("admin.apartments.edit", compact("apartment", "services"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApartmentsUpdateRequest $request, $slug)
    {
        $apartment = Apartment::where('slug', $slug)->first();

        // Inserts data validation
        $data = $request->validated();

        // If the user changed the title, update the slug
        if ($data["title"] !== $apartment->title) {
            // Call the function to generate a unique slug
            $data["slug"] = $this->createSlug($data["title"]);
        }

        // If the user has inserted a new image, update the file in the folder
        if (isset($data["thumbnail"])) {
            Storage::delete($apartment->thumbnail);
            $data["thumbnail"] = Storage::put("/apartments", $data["thumbnail"]);
        } else {
            $data["thumbnail"] = $apartment->thumbnail;
        };

        $data["services"] = $request->input('services', []);
        // Manually assign the services array
        // -> detaches the services not present in the new array
        // -> attaches services not present in the old array
        $apartment->services()->sync($data["services"]); // accesses the relationship and invokes the sync method

        $apartment->update($data); // Update item data

        return redirect()->route("admin.apartments.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $apartment = Apartment::where("slug", $slug)->firstOrFail();

        if ($apartment->thumbnail) {
            Storage::delete($apartment->thumbnail);
        }

        $apartment->services()->detach();
        $apartment->sponsorships()->detach();
        $apartment->delete();

        return redirect()->route("admin.apartments.index");
    }
}
