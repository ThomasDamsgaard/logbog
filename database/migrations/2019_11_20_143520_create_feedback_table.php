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
            $table->unsignedBigInteger('mini_c_e_x_e_s_id');
            $table->timestamp('date')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->tinyInteger('grade1')->nullable();
            $table->tinyInteger('grade2')->nullable();
            $table->tinyInteger('grade3')->nullable();
            $table->tinyInteger('grade4')->nullable();
            $table->tinyInteger('grade5')->nullable();
            $table->tinyInteger('grade6')->nullable();
            $table->tinyInteger('grade7')->nullable();
            $table->timestamps();

            $table->foreign('mini_c_e_x_e_s_id')->references('id')->on('mini_c_e_x_e_s');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('supervisor_id')->references('id')->on('supervisors');
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
        Schema::dropIfExists('feedback');
    }
}
