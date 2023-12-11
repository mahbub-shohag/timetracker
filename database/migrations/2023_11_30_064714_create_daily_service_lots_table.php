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
        Schema::create('daily_service_lots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daily_service_id');
            $table->boolean("plow");
            $table->boolean("salt");
            $table->boolean("shovel");
            $table->boolean("melter");
            $table->foreign('daily_service_id')->references('id')->on('daily_services')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_service_lots');
    }
};
