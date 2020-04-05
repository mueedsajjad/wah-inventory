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
            $table->string('gatePassId');
            $table->date('date');
            $table->string('driverId');
            $table->string('driverName');
            $table->string('driverPh');
            $table->string('vehicalNo');

            $table->string('vendorType');
            $table->string('vendorId');
            $table->string('vendorName');
            $table->string('vendorAddress');
            $table->string('vendorPh');

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
