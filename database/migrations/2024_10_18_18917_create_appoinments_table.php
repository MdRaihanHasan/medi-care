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
        Schema::create('appoinments', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID for each appointment
            $table->foreignId('patient_id')->constrained()->onDelete('cascade'); // Foreign key for patient
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade'); // Foreign key for doctor
            $table->string('appointment_date'); // Date of the appointment
            $table->string('appointment_from'); // Start time of the appointment
            $table->string('appointment_to'); // End time of the appointment
            $table->string('notes')->nullable(); // Additional notes about the appointment
            $table->timestamps(); // Created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoinments');
    }
};
