<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
  public function show($slug)
  {
    $apartment = Apartment::where('slug', $slug)->firstOrFail();
    $sponsorships = Sponsorship::all();

    if ($apartment->user_id !== Auth::id()) {
      return abort(404);
    }

    return view("admin.payment", compact("apartment", "sponsorships"));
  }

  public function success(Request $request)
  {
    $apartmentId = $request->input('apartment_id');
    $sponsorshipId = $request->input('sponsorship_id');

    $apartment = Apartment::find($apartmentId);
    $sponsorship = Sponsorship::find($sponsorshipId);

    if ($apartment && $sponsorship) {
      $apartment->sponsorships()->attach($sponsorship->id, [
        'start_date_time' => now(),
        'end_date_time' => now()->addHours($sponsorship->duration),
      ]);
    } else {
      return abort(404);
    }

    return view("admin.success");
  }
}
