<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreRequisitionIssuedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_requisition_issued', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_id');
            $table->string('store_location');
            $table->string('name');
            $table->integer('quantity');
            $table->date('issued_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_requisition_issued');
    }
}
