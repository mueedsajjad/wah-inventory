<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->date('leave_date')->nullable();
            $table->integer('leave_type_id')->nullable();
            $table->string('reason')->nullable();
            $table->integer('status')->nullable();
            $table->integer('days')->nullable();

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
        Schema::dropIfExists('leave');
    }
}
