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
            $table->string('supplierId');
            $table->string('transporter');
            $table->string('vehicalNo');
            $table->string('driver');
            $table->string('driverPh');
            $table->string('storeLocation');

            $table->date('date');
            $table->integer('status')->length(10);
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
