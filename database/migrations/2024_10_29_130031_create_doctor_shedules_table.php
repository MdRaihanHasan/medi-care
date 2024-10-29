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
        Schema::create('doctor_shedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id'); // Foreign key for the doctor
            $table->string('department'); // Department name
            $table->string('available_days'); // Available days in a suitable format (e.g., JSON or string)
            $table->time('start_time'); // From time
            $table->time('end_time'); // To time
            $table->text('notes')->nullable(); // Notes, nullable in case it's not filled out
            $table->enum('status', ['Active', 'Inactive']); // Status as Active or Inactive
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_shedules');
    }
};
