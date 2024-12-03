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
            $table->id();
            $table->string('room_number')->unique(); // Unique room number
            $table->unsignedBigInteger('ward_id'); // Foreign key to wards
            $table->integer('beds'); // Number of beds in the room
            $table->unsignedBigInteger('room_type_id'); // Type of room
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');

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
