<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ViewController extends Controller
{
  public function show($slug)
{
    // Trova l'appartamento in base allo slug
    $apartment = Apartment::where('slug', $slug)->firstOrFail();
    // Recupera le visualizzazioni dell'appartamento corrente per il mese corrente
    $currentMonthViews = View::where('apartment_id', $apartment->id)
      ->whereMonth('date_time', Carbon::now()->month)
      ->orderBy('date_time')
      ->get();

    // Prepara i dati per Chart.js
    $viewsByDay = $currentMonthViews->groupBy(function ($view) {
      return Carbon::parse($view->date_time)->format('d');
    });

    $labels = $viewsByDay->keys();
    $data = $viewsByDay->map->count()->values();

    // Passa i dati alla vista
    return view('admin.apartments.statistics', compact('currentMonthViews', 'labels', 'data'));
  }
}
