<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
  public function show($slug)
  {
    $apartment = Apartment::where('slug', $slug)->firstOrFail();
    $sponsorships = Sponsorship::all();
    $random = Str::random(32);

    if ($apartment->user_id !== Auth::id()) {
      return abort(404);
    }

    return view("admin.payment", compact("apartment", "sponsorships", "random"));
  }

  public function success(Request $request)
  {
    $apartmentId = $request->input('apartment_id');
    $sponsorshipId = $request->input('sponsorship_id');
    $pageToken = $request->input("token");

    if ($pageToken !== session('pageToken')) {
      session(['pageToken' => $pageToken]);

      $apartment = Apartment::find($apartmentId);
      $sponsorship = Sponsorship::find($sponsorshipId);

      if ($apartment && $sponsorship) {
        $apartment->sponsorships()->attach($sponsorship->id, [
          'start_date_time' => now(),
          'end_date_time' => now()->addHours($sponsorship->duration),
        ]);
      }

      return view("admin.success");
    } else {
      return abort(404);
    }
  }
}
