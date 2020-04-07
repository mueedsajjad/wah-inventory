<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInwardGatePassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inward_gate_pass', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purchase_order_id')->nullable();
            $table->string('requisition_id')->nullable();
            $table->string('gatePassId');
            $table->date('date');
            $table->string('driverId');
            $table->string('driverName');
            $table->string('driverPh');
            $table->string('vehicalNo');
            $table->string('vendorType')->nullable();
            $table->string('vendorId')->nullable();
            $table->string('vendorName')->nullable();
            $table->string('vendorAddress')->nullable();
            $table->string('vendorPh')->nullable();

            $table->integer('status')->length(11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inward_gate_pass');
    }
}
