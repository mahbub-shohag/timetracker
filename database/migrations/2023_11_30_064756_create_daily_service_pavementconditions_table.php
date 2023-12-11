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
        Schema::create('daily_service_pavementconditions', function (Blueprint $table) {
            $table->id();
            $table->boolean("clear");
            $table->boolean("snow_covered");
            $table->boolean("icy");
            $table->unsignedBigInteger('daily_service_id');
            $table->foreign('daily_service_id')->references('id')->on('daily_services')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_service_pavementconditions');
    }
};
