<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
  public function index(Request $request)
  {
    $city = $request->input('city');
    $address = $request->input('address');
    $rooms_number = $request->input('rooms_number');
    $beds_number = $request->input('beds_number');
    $bathrooms_number = $request->input('bathrooms_number');
    $services = $request->input('services');

    $query = Apartment::query();

    if ($city) {
      $query->where('city', 'like', '%' . $city . '%');
    }

    if ($address) {
      $query->where('address', 'like', '%' . $address . '%');
    }

    if($rooms_number) {
      $query->where('rooms-number', 'like', '%' . $rooms_number . '%');
    }

    if($beds_number) {
      $query->where('beds-number', 'like', '%' . $beds_number . '%');
    }

    if($bathrooms_number) {
      $query->where('bathrooms-number', 'like', '%' . $bathrooms_number . '%');
    }

    if ($services) {
      $query->whereHas('services', function ($q) use ($services) {
        $q->whereIn('service_id', $services);
      });
    }

    $apartments = $query
      ->with('services', 'sponsorships')
      ->get();

    return response()->json($apartments);
  }

  public function show($slug)
  {
    $apartment = Apartment::where("slug", $slug)
      ->with(['user', 'views', 'sponsorships', 'services'])
      ->first();

    return response()->json($apartment);
  }
}
