<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreMagazine2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_magazine_2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('materialName');
            $table->string('uom');
            $table->integer('quantity');
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
        Schema::dropIfExists('store_magazine_2');
    }
}
