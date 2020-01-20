<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mini_c_e_x_e_s_id')->nullable();
            $table->timestamp('date')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('supervisor_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->tinyInteger('grade1')->nullable();
            $table->tinyInteger('grade2')->nullable();
            $table->tinyInteger('grade3')->nullable();
            $table->tinyInteger('grade4')->nullable();
            $table->tinyInteger('grade5')->nullable();
            $table->tinyInteger('grade6')->nullable();
            $table->tinyInteger('grade7')->nullable();
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
        Schema::dropIfExists('feedback');
    }
}
