<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Booking;

class Payment extends Model
{
    use HasFactory;


    protected $table = 'payments'; // Set the table name if it's different from the model name

    protected $fillable = [
        'user_id', 'booking_id', 'amount', 'payment_method', 'transaction_id'
    ];

    // Define the relationships here
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
