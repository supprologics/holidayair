<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('deal_id');
            $table->integer('airline_id');
            $table->string('takeoff_airport');
            $table->string('landing_airport');
            $table->integer('time_hours');
            $table->integer('time_min');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_plans');
    }
}
