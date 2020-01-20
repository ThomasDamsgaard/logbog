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
            $table->integer('department_id')->nullable();
            $table->integer('age')->nullable();
            $table->integer('sex')->nullable();
            $table->string('primary_pain')->nullable();
            $table->integer('duration')->nullable();
            $table->string('icd10')->nullable();
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
        Schema::dropIfExists('clinical_presentations');
    }
}
