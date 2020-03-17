<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_store', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('bach_id');
            $table->string('component_name');
            $table->integer('quantity');
            $table->string('QC');
            $table->string('QA');

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
        Schema::dropIfExists('component_store');
    }
}
