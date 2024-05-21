<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervenantsTable extends Migration
{
    public function up()
    {
        Schema::create('intervenants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('etablissements_id')->nullable();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->string('matricule', 45)->nullable();
            $table->string('nom', 45)->nullable();
            $table->string('datenaissance', 45)->nullable();
            $table->string('intitule_diplome', 45)->nullable();
            $table->string('type_diplome', 45)->nullable();
            $table->string('specialite_diplome', 45)->nullable();
            $table->integer('type_intervenant')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('etablissements_id')->references('id')->on('etablissements');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('intervenants');
    }
}