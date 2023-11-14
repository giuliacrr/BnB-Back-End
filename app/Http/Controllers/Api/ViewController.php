<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\View;
use Illuminate\Http\Request;

class ViewController extends Controller
{
  public function getIp(Request $request)
  {
    $apartment_id = $request->input("apartment_id");
    $apartment = Apartment::find($apartment_id);
    // Verifica che il campo 'ip' sia presente nei dati inviati
    $data = $request->validate([
      'ip_address' => 'required|ip',
      'apartment_id' => 'required',
    ]);
    // Salva l'indirizzo IP nel database
    $newView = new View();
    $newView->ip_address = $data["ip_address"];
    $newView->apartment()->associate($apartment->id);
    $newView->date_time = now();

    $newView->save();


    return response()->json(['message' => 'IP address saved successfully']);
  }
}
