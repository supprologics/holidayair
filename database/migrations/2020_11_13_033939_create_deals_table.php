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
            $table->unsignedBigInteger('airline_id')->nullable();
            $table->foreign('airline_id')->references('id')->on('airlines')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('flight_type');
            $table->decimal('amount',10,2);
            $table->text('description');
            $table->unsignedBigInteger('class_type')->nullable();
            $table->foreign('class_type')->references('id')->on('flight_tickets_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cancellation_fee',10,2);
            $table->string('flight_change_fee',10,2);
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
        Schema::dropIfExists('deals');
    }
}
