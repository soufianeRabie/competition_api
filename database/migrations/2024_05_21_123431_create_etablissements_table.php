<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtablissementsTable extends Migration
{
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->unsignedBigInteger('regions_id');
            $table->string('nom_efp', 255)->unique();
            $table->string('adresse', 45)->nullable();
            $table->string('tel', 45)->nullable();
            $table->string('ville', 45)->nullable();
            $table->string('status', 45)->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('regions_id')->references('id')->on('regions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('etablissements');
    }
}