<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_material', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('material_requisition_id')->nullable();
            $table->string('gate_type')->nullable();
            $table->integer('manufacturing_no')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('create_date')->nullable();


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
        Schema::dropIfExists('production_material');
    }
}
