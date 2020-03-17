<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInwardRawMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inward_raw_material', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('materialName');
            $table->string('uom');
            $table->string('qty');
            $table->string('description');
            $table->string('gatePassId');

            $table->date('date');
            $table->string('storeLocation');
            $table->integer('status')->length(11);

            $table->date('inspectionDate');
            $table->string('inspectionStatus')->length(25);
            $table->longText('rejectionReason');
            $table->integer('rejectedQty')->length(11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inward_raw_material');
    }
}
