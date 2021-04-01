<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('applicationno')->unique();
            $table->string('cust_name');
            $table->string('cust_email');
            $table->string('cust_phone');
            $table->string('cust_dob')->nullable();
            $table->string('cust_address')->nullable();
            $table->string('cust_city')->nullable();
            $table->integer('cust_pincode')->nullable();
            $table->string('cust_bank')->nullable();
            $table->string('cust_profile')->nullable();
            $table->string('cust_name_two')->nullable();
            $table->string('cust_email_two')->nullable();
            $table->string('cust_phone_two')->nullable();
            $table->string('buying_door_no')->nullable();
            $table->string('project_name')->nullable();
            $table->string('builder_name')->nullable();
            $table->string('project_company_name')->nullable();
            $table->integer('bank_id')->nullable();
            $table->integer('bank_branch')->nullable();
            $table->integer('occupation_id')->nullable();
            $table->string('file_no')->nullable();
            $table->string('property_cost')->nullable();
            $table->string('loan_amount')->nullable();
            $table->string('mmr_payable')->nullable();
            $table->string('mmr_paid')->nullable();
            $table->string('type_of_funding')->nullable();
            $table->string('insurance_amt')->nullable();
            $table->date('sanctioned_date')->nullable();
            $table->string('applied_loan_amount')->nullable();
            $table->string('sanctioned_amount')->nullable();
            $table->integer('application_status')->nullable();
            $table->boolean('application_deleted')->default(false);
            $table->string('telecallername')->nullable();
            $table->integer('emp_id')->nullable();
            $table->integer('installment_num')->default(0);
            $table->string("reason")->nullable();
            $table->string("pending_amount")->nullable();
            $table->string("docs_ids")->nullable();
            $table->string("extradocs")->nullable();
            $table->string('disburdsment_amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
