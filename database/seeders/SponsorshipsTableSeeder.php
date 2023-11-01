<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $sponsorships = [
      [
        "title" => "Base",
        "description" => "Pacchetto base della durata di 24 ore",
        "price" => 2.99,
        "duration" => 24,
      ],
      [
        "title" => "Plus",
        "description" => "Pacchetto base della durata di 72 ore",
        "price" => 5.99,
        "duration" => 72,
      ],
      [
        "title" => "Premium",
        "description" => "Pacchetto base della durata di 144 ore",
        "price" => 9.99,
        "duration" => 144,
      ],
    ];

    foreach ($sponsorships as $sponsorship) {
      Sponsorship::create([
        'title' => $sponsorship["title"],
        'description' => $sponsorship["description"],
        'price' => $sponsorship["price"],
        'duration' => $sponsorship["duration"],
      ]);
    }
  }
}