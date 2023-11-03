<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
  public function index(Request $request)
  {
    $city = $request->input('city');
    $address = $request->input('address');

    $query = Apartment::query();

    if ($city) {
        $query->where('city', 'like', '%' . $city . '%');
    }

    if ($address) {
        $query->where('address', 'like', '%' . $address . '%');
    }

    $apartments = $query->get();

    return response()->json($apartments);
  }

  public function show($slug)
  {
    $apartment = Apartment::where("slug", $slug)
      ->with(['user','views','sponsorships','services'])
      ->first();

      return response()->json($apartment);
  }
}
