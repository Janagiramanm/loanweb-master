<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCibilDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cibil_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cibil_setting_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name')->nullable();
            $table->string('ltv1')->nullable();
            $table->string('ltv2')->nullable();
            $table->string('ltv3')->nullable();
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
        Schema::dropIfExists('cibil_details');
    }
}
