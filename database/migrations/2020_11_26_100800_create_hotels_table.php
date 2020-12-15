<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('hotelcategory_id')->nullable();
            $table->foreign('hotelcategory_id')->references('id')->on('hotel_categories');
            $table->string('name');
            $table->text('description');
            $table->string('logo')->nullable();
            $table->string('city');
            $table->integer('flag');
            $table->decimal('lat',8,6);
            $table->decimal('lng',8,6);
            $table->integer('minstay');
            $table->integer('rating');
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
        Schema::dropIfExists('hotels');
    }
}
