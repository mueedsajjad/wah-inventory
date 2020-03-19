<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInwardGoodsReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inward_goods_receipt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('grn');
            $table->date('grnDate');
            $table->string('document')->nullable();
            $table->string('purchasedFrom');
            $table->string('gatePassId');
            $table->float('totalCost');
            $table->string('name');
            $table->string('purchaseOrderNo');
            $table->string('materialName');
            $table->string('uom');
            $table->string('description');
            $table->string('totalQuantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inward_goods_receipt');
    }
}
