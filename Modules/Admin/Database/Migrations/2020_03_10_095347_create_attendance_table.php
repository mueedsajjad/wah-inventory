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
            $table->integer('markedEmployeeId')->nullable();
            $table->date('date')->nullable();
            $table->time('inTime')->nullable();
            $table->time('outTime')->nullable();
            $table->integer('late')->nullable();
            $table->integer('status')->nullable();

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
        Schema::dropIfExists('attendance');
    }
}
