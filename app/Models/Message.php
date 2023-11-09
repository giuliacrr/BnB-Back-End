<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Create an array indicating the columns to populate
    // protected $fillable = [
    //     "name",
    //     "email",
    //     "message_text",
    //     "apartment_id"
    // ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
