<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
    $sponsorships = $request->input('sponsorships');
    $lat = 0;
    $lon = 0;
    $radius = $request->input('radius'); // Raggio in chilometri

    $query = Apartment::query();

    if ($address) {
      $key = 'O8G3nbrrFXgXG05YvxpNGd9inXNQbAJp';

      $response = Http::get("https://api.tomtom.com/search/2/geocode/getaddress.json", [
        'query' => $address,
        'key' => $key,
      ]);

      $geocodingData = $response->json();

      if (!empty($geocodingData['results'])) {
        $location = $geocodingData['results'][0]['position'];
        $lat = $location['lat'];
        $lon = $location['lon'];
      }

      if ($lat && $lon && $radius) {
        $query->whereRaw("6371 * ACOS(
          COS(RADIANS($lat)) * COS(RADIANS(latitude)) * COS(RADIANS(longitude) - RADIANS($lon))
          + SIN(RADIANS($lat)) * SIN(RADIANS(latitude))
        ) <= $radius");
      }
    }

    if ($rooms_number) {
      if ($rooms_number == 1 || $rooms_number == 2) {
        $query->where('rooms_number', 'like', '%' . $rooms_number . '%');
      } elseif ($rooms_number >= 3)
        $query->where('rooms_number', '>=', 3);
    }

    if ($beds_number) {
      if ($beds_number == 1 || $beds_number == 2) {
        $query->where('beds_number', 'like', '%' . $beds_number . '%');
      } elseif ($beds_number >= 3)
        $query->where('beds_number', '>=', 3);
    }

    if ($bathrooms_number) {
      if ($bathrooms_number == 1 || $bathrooms_number == 2) {
        $query->where('bathrooms_number', 'like', '%' . $bathrooms_number . '%');
      } elseif ($bathrooms_number >= 3)
        $query->where('bathrooms_number', '>=', 3);
    }

    if ($services) {
      $query->whereHas('services', function ($q) use ($services) {
        $q->whereIn('service_id', $services);
      });
    }

    if ($sponsorships && $sponsorships == 1){
      $query->whereHas('sponsorships', function ($q) {
        $now = now(); // Data e ora attuali
        $q->where('start_date_time', '<=', $now)->where('end_date_time', '>=', $now);
    });
    }

    $apartments = $query
      ->with('services', 'sponsorships')
      ->get();

    // Recupera tutti i servizi
    $allServices = Service::all();

    return response()->json([
      'apartments' => $apartments,
      'services' => $allServices,
    ]);
  }

  public function show($slug)
  {
    $apartment = Apartment::where("slug", $slug)
      ->with(['user', 'views', 'sponsorships', 'services'])
      ->first();

    return response()->json($apartment);
  }
}
