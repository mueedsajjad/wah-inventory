<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionComponentDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_component_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('component_requisition_id')->nullable();
            $table->string('gate_type')->nullable();
            $table->string('component_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('description')->nullable();
            $table->integer('production_component_id')->nullable();
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
        Schema::dropIfExists('production_component_detail');
    }
}
