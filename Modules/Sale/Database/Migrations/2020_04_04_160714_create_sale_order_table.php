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
            $table->date('delivery_date')->nullable();
            $table->string('customer_id')->nullable();
            $table->bigInteger('driver_id')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('vehicle_number')->nullable();
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
        Schema::dropIfExists('sale_order');
    }
}
