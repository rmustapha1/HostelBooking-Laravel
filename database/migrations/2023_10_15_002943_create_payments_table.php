<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to the user making the payment
            $table->unsignedBigInteger('booking_id'); // Foreign key to the booking associated with the payment
            $table->decimal('amount', 10, 2); // Payment amount (assuming a decimal type with 10 total digits and 2 decimal places)
            $table->string('payment_method'); // Payment method (e.g., credit card, PayPal)
            $table->string('transaction_id'); // Payment gateway transaction ID
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('booking_id')->references('id')->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
