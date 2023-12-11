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
        Schema::create('client_service_employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_service_id')->index();
            $table->unsignedBigInteger('employee_id')->index();
            $table->foreign('client_service_id')->references('id')->on('client_services')->cascadeOnDelete();
            $table->foreign('employee_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_service_employees');
    }
};
