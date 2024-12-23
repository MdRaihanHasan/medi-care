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
        Schema::table('appoinments', function (Blueprint $table) {
            $table->enum('bill_status', ['paid', 'unpaid'])->default('unpaid'); // Adding bill_status column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appoinments', function (Blueprint $table) {
            $table->dropColumn('bill_status'); // Dropping bill_status column
        });
    }
};
