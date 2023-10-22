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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('student_id'); // Foreign Key referencing Users table for students
            $table->unsignedBigInteger('hostel_id'); // Foreign Key referencing Hostels table
            $table->unsignedTinyInteger('rating'); // Rating from 1 to 5
            $table->text('comment')->nullable(); // Comment text (optional)
            $table->timestamps(); // Created at and updated at timestamps

            // Define foreign key constraints
            $table->foreign('student_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('hostel_id')
                ->references('id')
                ->on('hostels')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};