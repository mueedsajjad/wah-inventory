<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('so_number')->nullable();
            $table->date('date')->nullable();
            $table->string('name')->nullable();
            $table->string('product_number')->nullable();
            $table->integer('quantity')->nullable();

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
        Schema::dropIfExists('sale_order');
    }
}
