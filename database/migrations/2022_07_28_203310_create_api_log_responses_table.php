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
    public function up()
    {
        Schema::create('api_log_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id')->unsigned()->unique();
            $table->string('method');
            $table->text('content');
            $table->unsignedSmallInteger('error_code')->nullable();
            $table->text('error_message')->nullable();
            $table->timestamps();
        });

        Schema::table('api_log_responses', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('api_log_requests')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_log_responses');
    }
};
