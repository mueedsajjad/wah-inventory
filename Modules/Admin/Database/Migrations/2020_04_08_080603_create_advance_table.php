<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('recieptNo')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('installment')->nullable();
            $table->integer('advanceAmount')->nullable();
            $table->integer('recieveAmount')->nullable();
            $table->integer('remainingAmount')->nullable();
            $table->date('date')->nullable();
            $table->date('advanceDate')->nullable();
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
        Schema::dropIfExists('advance');
    }
}
