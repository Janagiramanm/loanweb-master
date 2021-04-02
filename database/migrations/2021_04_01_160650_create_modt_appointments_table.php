<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModtAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modt_appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->date('appointment_date');
            $table->integer('timeslot_id');
            $table->integer('created_excutive')->unsigned();
            $table->integer('status')->unsigned();
            $table->string('docs_ids')->nullable();
            $table->string('applicant_type')->nullable();
            $table->integer('appointmenttype_id')->unsigned();
            $table->text('type')->nullable();
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
        Schema::dropIfExists('modt_appointments');
    }
}
