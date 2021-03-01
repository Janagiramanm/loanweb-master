<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builders', function (Blueprint $table) {
            $table->id();
            $table->string('builder_name')->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_type')->nullable();
            $table->string('project_type_name')->nullable();
            $table->string('range')->nullable();
            $table->string('spoc_name')->nullable();
            $table->string('spoc_mobile')->nullable();
            $table->string('spoc_email')->nullable();
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
        Schema::dropIfExists('builders');
    }
}
