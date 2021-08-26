<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoipCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voip_customers', function (Blueprint $table) {
            $table->id();
            $table->dateTime('call_datetime')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->string('disposition')->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('agent_name')->nullable();
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
        Schema::dropIfExists('voip_customers');
    }
}
