<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->decimal('amount',10,2);
            $table->integer('adults');
            $table->integer('kids')->nullable();
            $table->date('checkindate')->nullable();
            $table->date('checkutdate')->nullable();
            $table->integer('bookings')->nullable();
            $table->integer('flag');
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
        Schema::dropIfExists('rooms');
    }
}
