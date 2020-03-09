<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('purchase_order', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('po_number')->nullable();
            $table->date('po_date')->nullable();
            $table->string('upload')->nullable();
            $table->integer('credit_term')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->string('supplier_name')->nullable();
            $table->integer('status')->nullable();
            $table->integer('purchase_by')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('approve_by')->nullable();

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
        Schema::dropIfExists('purchase_order');
    }
}
