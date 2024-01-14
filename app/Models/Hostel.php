<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    use HasFactory;

    protected $fillable = ['school_id', 'manager_id', 'name', 'description', 'location', 'no_of_rooms', 'status'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    // Define the relationship with rooms
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    // Define the relationship with subscriptions
    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function manager()
    {
        return $this->belongsTo(User::class);
    }
}