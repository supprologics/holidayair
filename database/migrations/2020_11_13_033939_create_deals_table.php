<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('airline_id');
            $table->integer('country_id');
            $table->string('name');
            $table->string('flight_type');
            $table->decimal('amount',10,2);
            $table->text('description');
            $table->string('class_type');
            $table->decimal('cancellation_fee',10,2);
            $table->decimal('flight_change_fee',10,2);
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
        Schema::dropIfExists('deals');
    }
}
