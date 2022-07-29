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
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mmsi')->unsigned()->unique();
            $table->tinyInteger('status');
            $table->unsignedInteger('stationId');
            $table->unsignedSmallInteger('speed');
            $table->unsignedFloat('lon');
            $table->unsignedFloat('lat');
            $table->integer('course');
            $table->integer('heading');
            $table->string('rot')->nullable();
            $table->unsignedInteger('timestamp');
            $table->timestamps();
        });

        Schema::table('tracks', function (Blueprint $table) {
            $table->foreign('mmsi')->references('id')->on('vessels')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
