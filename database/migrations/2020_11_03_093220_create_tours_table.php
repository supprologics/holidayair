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
            $table->integer('category_id');
            $table->integer('country_id');
            $table->String('name');
            $table->text('description');
            $table->String('duration');
            $table->integer('days');
            $table->integer('nights')->nullable();
            $table->decimal('amount', 9, 2);
            $table->integer('rating')->nullable();
            $table->integer('hits')->nullable();
            $table->integer('is_highlight')->nullable();
            $table->integer('online')->nullable();
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
