<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_order_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('production_order_id')->nullable();
            $table->integer('items_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('cost')->nullable();

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
        Schema::dropIfExists('production_order_detail');
    }
}
