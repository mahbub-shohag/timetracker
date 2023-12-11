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
        Schema::create('daily_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('createdBy');
            $table->dateTime('clockIn');
            $table->dateTime('clockOut');
            $table->double('amountOfMaterial');
            $table->string('materialUnit');
            $table->string('comment');
            $table->string('commentUnusual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_services');
    }
};
