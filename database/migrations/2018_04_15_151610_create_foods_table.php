<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('food_id');
            $table->string('food_name', 100);
            $table->string('food_img', 100);
            $table->longText('food_description');
            $table->longText('food_highlight');
            $table->longText('food_ingredient');
            $table->decimal('food_price', 5, 2);
            $table->decimal('food_delivery', 5, 2);
            $table->integer('cat_id');
            $table->dateTime('created');
            $table->dateTime('modified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
