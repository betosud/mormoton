<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Anwergame extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answergame',function (Blueprint $table){
            $table->increments('id');
            $table->integer('idgame')->unsigned();
            $table->foreign('idgame')->references('id')->on('games');
            $table->integer('idquestion')->unsigned();
            $table->foreign('idquestion')->references('id')->on('question');
            $table->integer('correcta');
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
        Schema::drop('answergame');
    }
}
