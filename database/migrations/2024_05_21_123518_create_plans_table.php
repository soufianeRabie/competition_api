<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('exercice')->nullable();
            $table->unsignedBigInteger('etablissements_id');
            $table->unsignedBigInteger('themes_id');
            $table->integer('nbjours')->nullable();
            $table->integer('nbparticipantmaxi')->nullable();
            $table->float('cout_previsionnel')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('etablissements_id')->references('id')->on('etablissements');
            $table->foreign('themes_id')->references('id')->on('themes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
}