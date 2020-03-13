<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('designation_id')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('gender_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address')->nullable();
            $table->string('upload')->nullable();

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
        Schema::dropIfExists('employees');
    }
}
