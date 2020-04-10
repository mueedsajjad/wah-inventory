<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_id')->nullable();
            $table->string('name')->nullable();
            $table->string('m_number')->nullable();
            $table->string('p_number')->nullable();
            $table->string('credit_term')->nullable();
            $table->string('email_id')->nullable();
            $table->string('customer_status')->nullable();
            $table->string('gstn_number')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('tax_reference_no')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('payment_terms')->nullable();

            $table->date('registration_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
