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
            $table->id();
            
            // Patient details
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('mobile');
            $table->string('email')->unique();
            $table->text('address');
            $table->date('birth_date')->nullable();

            // Appointment details
            $table->date('appointment_date');
            $table->time('appointment_from');
            $table->time('appointment_to');
            $table->unsignedBigInteger('doctor_id')->nullable(); // Foreign key for doctor
            $table->string('treatment')->nullable();
            $table->text('notes')->nullable();
            $table->string('avatar')->nullable(); // Path to avatar image file
            
            $table->timestamps();

            // Foreign key relationship for doctor (optional)
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null');
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
