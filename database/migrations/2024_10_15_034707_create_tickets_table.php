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
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigInteger('flight_id')->unsigned();
            
            $table->id();
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
            $table->string('passenger_name')->nullable(false);
            $table->string('passenger_phone', 14)->nullable(false);
            $table->string('seat_number', 3)->nullable(false);
            $table->boolean('is_boarding')->default(0);
            $table->datetime('boarding_time')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};