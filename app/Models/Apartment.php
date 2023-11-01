<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    // Create an array indicating the columns to populate
    protected $fillable = [
        "title",
        "rooms_number",
        "beds_number",
        "bathrooms_number",
        "square_meters",
        "address",
        "latitude",
        "longitude",
        "thumbnail",
        "visibility"
    ];
}
