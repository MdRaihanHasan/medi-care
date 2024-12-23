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
        Schema::create('patient_service_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // Links to services
            $table->foreignId('patient_id')->constrained()->onDelete('cascade'); // Links to patients
            $table->enum('patient_type', ['indoor', 'outdoor']); // Indoor or Outdoor patient
            $table->date('date'); // Schedule date
            $table->time('start_time'); // Start time of the service
            $table->time('end_time'); // End time of the service
            $table->string('status')->default('available'); // Status (e.g., available, booked)
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_service_schedules');
    }
};
