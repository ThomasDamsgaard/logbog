<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiniCEXESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_c_e_x_e_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('date');
            $table->string('supervisor');
            $table->string('department');
            $table->integer('age');
            $table->string('sex');
            $table->string('complaint');
            $table->string('duration');
            $table->string('diagnosis');
            $table->tinyInteger('grade1');
            $table->tinyInteger('grade2');
            $table->tinyInteger('grade3');
            $table->tinyInteger('grade4');
            $table->tinyInteger('grade5');
            $table->tinyInteger('grade6');
            $table->tinyInteger('grade7');
            $table->tinyInteger('grade8');
            $table->tinyInteger('grade9');
            $table->tinyInteger('cc');
            $table->string('activities');
            $table->string('user_id');
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
        Schema::dropIfExists('mini_c_e_x_e_s');
    }

}
