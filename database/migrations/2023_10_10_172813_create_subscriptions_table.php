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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('hostel_id'); // Foreign Key referencing Hostels table
            $table->date('subscription_start_date');
            $table->date('subscription_end_date');
            $table->enum('payment_status', ['Paid', 'Pending', 'Expired']); // Payment status

            // Define foreign key constraint
            $table->foreign('hostel_id')
                ->references('id')
                ->on('hostels')
                ->onDelete('cascade');

            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};