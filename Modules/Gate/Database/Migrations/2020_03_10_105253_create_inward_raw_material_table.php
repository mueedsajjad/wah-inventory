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
            $table->string('purchase_order_id')->nullable();
            $table->string('requisition_id')->nullable();
            $table->string('itemType');
            $table->string('materialName')->nullable();
            $table->string('uom');
            $table->string('qty');
            $table->string('order_qty')->nullable();
            $table->string('description');
            $table->string('gatePassId');
            $table->string('storeLocation')->nullable();
            $table->date('date');
            $table->integer('status')->length(11);
            $table->date('inspectionDate')->nullable();
            $table->string('inspectionStatus')->length(25)->nullable();
            $table->longText('rejectionReason')->nullable();
            $table->integer('rejectedQty')->length(11)->nullable();
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
