<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('userId')->nullable();
            $table->date('date')->nullable();
            $table->time('inTime')->nullable();
            $table->time('outTime')->nullable();
            $table->integer('status')->nullable();

            $table->string('dutyTime')->nullable();
            $table->string('workingTime')->nullable();
            $table->string('overTime')->nullable();
            $table->string('checkIn')->nullable();

            $table->integer('leaveId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance');
    }
}
