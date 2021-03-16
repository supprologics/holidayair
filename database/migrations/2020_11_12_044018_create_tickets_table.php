<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('airline_id')->nullable();
            $table->foreign('airline_id')->references('id')->on('airlines')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('flightticketscategory_id')->nullable();
            $table->foreign('flightticketscategory_id')->references('id')->on('flight_tickets_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->decimal('amount',10,2);
            $table->string('flight_type');
            $table->integer('discount')->nullable();
            $table->date('discounton')->nullable();
            $table->date('discountout')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
