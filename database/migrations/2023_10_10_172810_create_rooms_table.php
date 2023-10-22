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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('hostel_id'); // Foreign Key referencing Hostels table
            $table->enum('room_type', ['1 in 1', '2 in 1', '3 in 1', '4 in 1']);
            $table->decimal('price_per_night', 8, 2);
            $table->integer('total_slots'); // Total slots in the room
            $table->integer('available_slots'); // Available slots in the room

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
        Schema::dropIfExists('rooms');
    }
};