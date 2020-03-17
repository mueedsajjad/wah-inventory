<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionOrderStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_order_stage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('production_order_id')->nullable();
            $table->string('stage')->nullable();
            $table->string('resource')->nullable();
            $table->integer('stage_cost')->nullable();
            $table->integer('status')->nullable();

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
        Schema::dropIfExists('production_order_stage');
    }
}
