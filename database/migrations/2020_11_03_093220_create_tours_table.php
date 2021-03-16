<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->String('name');
            $table->text('description');
            $table->String('duration');
            $table->integer('days')->nullable();
            $table->integer('nights')->nullable();
            $table->decimal('amount', 9, 2);
            $table->integer('rating')->nullable();
            $table->integer('hits')->nullable();
            $table->integer('is_highlight')->nullable();
            $table->integer('online')->nullable();
            $table->integer('seasonon')->nullable();
            $table->integer('seasonout')->nullable();
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
        Schema::dropIfExists('tours');
    }
}
