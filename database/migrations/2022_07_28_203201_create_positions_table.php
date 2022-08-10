<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mmsi');
            $table->tinyInteger('status');
            $table->unsignedInteger('stationId');
            $table->unsignedSmallInteger('speed');
            $table->unsignedFloat('lon', 8, 5);
            $table->unsignedFloat('lat', 8, 5);
            $table->integer('course');
            $table->integer('heading');
            $table->string('rot')->nullable();
            $table->unsignedInteger('timestamp');
        });

        Schema::table('positions', function (Blueprint $table) {
            $table->foreign('mmsi')->references('mmsi')->on('vessels')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
