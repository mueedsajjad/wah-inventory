<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinishedGoods2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_finished_goods_2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacturing_order');
            $table->string('name');
            $table->integer('quantity');
            $table->integer('total_cost');
            $table->date('stored_date');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finished_goods_2');
    }
}
