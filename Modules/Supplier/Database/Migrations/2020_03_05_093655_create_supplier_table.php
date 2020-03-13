<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supplier_id');
            $table->string('currency');
            $table->string('name');
            $table->string('m_number');
            $table->string('p_number');
            $table->string('credit_term');
            $table->string('email');
            $table->string('status');
            $table->string('gstn_number');
            $table->string('state');
            $table->string('city');
            $table->string('tax_excise_no');
            $table->string('vat_tin_no');
            $table->string('payment_terms');
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('account_num');

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
        Schema::dropIfExists('supplier');
    }
}
