<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['hostel_id', 'subscription_start_date', 'subscription_end_date', 'payment_status'];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
}
