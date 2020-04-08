<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacturing_order')->nullable();
            $table->string('product')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('total_cost')->nullable();
            $table->integer('status')->nullable();
            $table->date('production_deadline')->nullable();
            $table->date('created_date')->nullable();
            $table->integer('stage_status')->nullable();

            $table->string('type')->nullable();
            $table->string('type')->nullable();
            $table->string('inspectionStatus')->nullable();
            $table->string('inspectionDate')->nullable();
            $table->string('rejectionReason')->nullable();
            $table->string('rejectionQty')->nullable();
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
        Schema::dropIfExists('production_order');
    }
}
