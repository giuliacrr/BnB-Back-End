<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = require base_path('storage/data/services.php');
        foreach ($services as $service) {
            $newService = new Service();

            $newService->title = $service["title"];
            $newService->description = $service["description"];
            $newService->icon = $service["icon"];

            $newService->save();
        }
    }
}
