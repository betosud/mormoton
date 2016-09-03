<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Answers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers',function (Blueprint $table){
            $table->increments('id');
            $table->integer('idquestion')->unsigned();
            $table->foreign('idquestion')->references('id')->on('question');
            $table->string('answer');
            $table->integer('correcta');
            $table->string('canonico');
            $table->string('libro');
            $table->string('versiculos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers');
    }
}
