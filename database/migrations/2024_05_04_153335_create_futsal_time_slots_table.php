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
        Schema::create('futsal_time_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('futsal_id')->nullable()->constrained('futsal_details')->onDelete('cascade');
            $table->string('timeslots');
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('futsal_time_slots');
    }
};
