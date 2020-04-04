<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequisitionsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requisitions_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('req_id');
            $table->string('requisition_id');
            $table->string('material_name');
            $table->string('uom');
            $table->string('description');
            $table->string('quantity');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('purchase_requisitions_detail');
    }
}
