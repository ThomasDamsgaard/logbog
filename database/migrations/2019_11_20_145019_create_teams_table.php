<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->tinyInteger('active')->nullable();
            $table->timestamp('b_start')->nullable();
            $table->timestamp('b_end')->nullable();
            $table->timestamp('c_start')->nullable();
            $table->timestamp('c_end')->nullable();
            $table->timestamp('d_start')->nullable();
            $table->timestamp('d_end')->nullable();
            $table->timestamp('e_start')->nullable();
            $table->timestamp('e_end')->nullable();
            $table->timestamp('f_start')->nullable();
            $table->timestamp('f_end')->nullable();
            $table->timestamp('g_start')->nullable();
            $table->timestamp('g_end')->nullable();
            $table->timestamp('h_start')->nullable();
            $table->timestamp('h_end')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
