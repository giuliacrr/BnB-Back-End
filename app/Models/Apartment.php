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
        "slug",
        "user_id",
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
