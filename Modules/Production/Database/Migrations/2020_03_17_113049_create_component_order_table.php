<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacturing_order')->nullable();
            $table->string('component_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('total_cost')->nullable();
            $table->integer('status')->nullable();
            $table->date('production_deadline')->nullable();
            $table->date('created_date')->nullable();
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
        Schema::dropIfExists('component_order');
    }
}
