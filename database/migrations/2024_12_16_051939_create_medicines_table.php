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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('medicine_category_id')->constrained()->onDelete('cascade');
            $table->string('manufacturer')->nullable();
            $table->string('dosage_form'); // e.g., Tablet, Syrup
            $table->string('strength'); // e.g., 500mg
            $table->decimal('price', 8, 2);
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
