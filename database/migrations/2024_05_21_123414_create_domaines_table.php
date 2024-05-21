<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainesTable extends Migration
{
    public function up()
    {
        Schema::create('domaines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_domaine', 255);
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('domaines');
    }
}