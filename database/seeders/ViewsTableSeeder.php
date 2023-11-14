<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViewsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Trova tutti gli appartamenti
    $apartments = Apartment::all();

    foreach ($apartments as $apartment) {
      // Genera un numero casuale di visualizzazioni per ciascun appartamento
      $numberOfViews = rand(20, 50);

      // Crea le visualizzazioni finte
      for ($i = 0; $i < $numberOfViews; $i++) {
        View::create([
          'apartment_id' => $apartment->id,
          'ip_address' => '185.13.221.104',
          'date_time' => Carbon::now()->subDays(rand(1, 30)), // Date casuali nei 30 giorni precedenti
        ]);
      }
    }
  }
}
