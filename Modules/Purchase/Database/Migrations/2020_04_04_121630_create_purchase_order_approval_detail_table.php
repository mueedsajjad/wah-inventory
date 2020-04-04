<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderApprovalDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_approval_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('po_id');
            $table->string('purchase_order_id');
            $table->string('material_name');
            $table->string('uom');
            $table->string('description');
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('total_price');
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
        Schema::dropIfExists('purchase_order_approval_detail');
    }
}
