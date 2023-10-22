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
        Schema::create('hostels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('location');
            $table->string('no_of_rooms');
            $table->unsignedBigInteger('manager_id'); // Foreign key column
            $table->unsignedBigInteger('school_id'); // Foreign key column
            $table->enum('status', ['Active', 'Inactive']);
            $table->timestamps();


            $table->foreign('manager_id') // Foreign key constraint
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // Optional: Specify the onDelete action

            $table->foreign('school_id') // Foreign key constraint
                ->references('id')
                ->on('schools')
                ->onDelete('cascade'); // Optional: Specify the onDelete action
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hostels');
    }
};