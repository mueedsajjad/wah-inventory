<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_management', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('record_id');
            $table->string('vehicle_no');
            $table->string('driver');
            $table->string('from');
            $table->string('to');
            $table->integer('out_meter_reading');
            $table->integer('in_meter_reading')->nullable();

            $table->dateTime('out_time');
            $table->dateTime('in_time')->nullable();
            $table->integer('distance')->nullable();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_management');
    }
}
