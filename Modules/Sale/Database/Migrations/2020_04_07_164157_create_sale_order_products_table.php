<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_order_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('so_number')->nullable();
            $table->string('product_code')->nullable();
            $table->integer('uom')->nullable();
            $table->bigInteger('qty')->nullable();
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_order_products');
    }
}
