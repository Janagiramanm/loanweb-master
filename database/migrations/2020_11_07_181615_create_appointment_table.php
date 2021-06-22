<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('second_customer_id')->nullable(); 
            $table->date('appointment_date');
            $table->integer('timeslot_id');
            $table->integer('created_excutive')->unsigned();
            $table->integer('status')->unsigned();
            $table->string('docs_ids')->nullable();
            $table->string('second_cust_docs_ids')->nullable();
            $table->string('applicant_type')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('stop_lat')->nullable();
            $table->string('stop_long')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('stop_time')->nullable();
            $table->string('comments')->nullable();
            $table->integer('appointmenttype_id')->unsigned();
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
        Schema::dropIfExists('appointment');
    }
}
