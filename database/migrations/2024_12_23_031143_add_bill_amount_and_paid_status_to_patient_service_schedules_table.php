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
        Schema::table('patient_service_schedules', function (Blueprint $table) {
            $table->decimal('bill_amount', 10, 2)->nullable()->after('status'); // Bill amount
            $table->enum('paid_status', ['Paid', 'Unpaid'])->default('Unpaid')->after('bill_amount'); // Paid status

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_service_schedules', function (Blueprint $table) {
            $table->dropColumn(['bill_amount', 'paid_status']);
        });
    }
};
