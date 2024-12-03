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
        Schema::create('patient_treatments', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedBigInteger('patient_id'); // Reference to the patient
            $table->string('treatment_type'); // Type of treatment: 'endor' or 'outdoor'
            $table->text('treatment_details')->nullable(); // Details about the treatment
            $table->date('treatment_date'); // Date of treatment
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_treatments');
    }
};
