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
        Schema::table('patients', function (Blueprint $table) {
            $table->timestamp('discharged_at')->nullable(); // Nullable field for discharge date
            $table->string('note')->nullable(); // Reason for discharge
            $table->string('bill')->nullable(); // Reason for discharge

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('discharged_at');
        });
    }
};
