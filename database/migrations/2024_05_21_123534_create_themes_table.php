<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('domaines_id');
            $table->string('nom_theme', 45)->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('domaines_id')->references('id')->on('domaines');
        });
    }

    public function down()
    {
        Schema::dropIfExists('themes');
    }
}