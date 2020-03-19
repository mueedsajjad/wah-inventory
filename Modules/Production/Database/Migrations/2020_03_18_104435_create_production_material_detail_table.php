<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionMaterialDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_material_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('material_name')->nullable();
            $table->integer('UOM')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('description')->nullable();
            $table->integer('production_material_id')->nullable();

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
        Schema::dropIfExists('production_material_detail');
    }
}
