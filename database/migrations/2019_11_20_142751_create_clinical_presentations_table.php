<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicalPresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinical_presentations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('mini_c_e_x_e_s_id');
            $table->integer('age')->nullable();
            $table->integer('sex')->nullable();
            $table->string('primary_pain')->nullable();
            $table->integer('duration')->nullable();
            $table->string('icd10')->nullable();
            $table->timestamps();

            $table->foreign('mini_c_e_x_e_s_id')->references('id')->on('mini_c_e_x_e_s')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinical_presentations');
    }
}
