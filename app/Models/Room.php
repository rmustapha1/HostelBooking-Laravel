<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['hostel_id', 'room_type', 'room_no', 'price_per_year', 'total_slots', 'available_slots'];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
