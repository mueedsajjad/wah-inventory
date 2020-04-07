<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpraOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppra_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('po_id');
            $table->string('requisition_id');
            $table->string('purchase_order_id');
            $table->string('commercial_offer');
            $table->string('technical_offer');
            $table->string('vendor_id');
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
        Schema::dropIfExists('ppra_order');
    }
}
