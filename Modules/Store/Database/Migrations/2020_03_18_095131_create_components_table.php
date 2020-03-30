<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacturing_order')->nullable();
            $table->string('name');
            $table->integer('quantity');
            $table->integer('total_cost')->nullable();
            $table->date('stored_date');
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
        Schema::dropIfExists('components');
    }
}
