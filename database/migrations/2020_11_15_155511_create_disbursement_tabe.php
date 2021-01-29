<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisbursementTabe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disbursement_tab', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('disbursement_amount');
            $table->date('date_of_disbursement');
            $table->integer('installment_num')->default(0);
            $table->string('cheque_no')->nullable();
            $table->string('cheque_amount')->nullable();
            $table->date('cheque_date')->nullable();
            $table->string('neft_urt_no')->nullable();
            $table->string('neft_amount')->nullable();
            $table->date('neft_date')->nullable();
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
        Schema::dropIfExists('disbursement_tab');
    }
}
