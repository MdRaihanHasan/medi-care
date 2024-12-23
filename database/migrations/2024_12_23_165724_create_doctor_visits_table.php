<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('doctor_visits')) {
            Schema::create('doctor_visits', function (Blueprint $table) {
                $table->id();
                $table->foreignId('patient_id')->constrained();
                $table->foreignId('doctor_id')->constrained();
                $table->date('visit_date');
                $table->text('prescription_details')->nullable();
                $table->enum('type', ['medicine', 'service']);
                $table->timestamps();
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_visits');
    }
};
