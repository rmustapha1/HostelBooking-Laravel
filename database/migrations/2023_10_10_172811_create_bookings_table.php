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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // Foreign key column
            $table->unsignedBigInteger('room_id'); // Foreign key column
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->enum('status', ['Reserved', 'Confirmed', 'Canceled']);
            $table->timestamps();


            $table->foreign('student_id') // Foreign key constraint
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // Optional: Specify the onDelete action

            $table->foreign('room_id') // Foreign key constraint
                ->references('id')
                ->on('rooms')
                ->onDelete('cascade'); // Optional: Specify the onDelete action
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};