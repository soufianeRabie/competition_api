<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->string('raison', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('site', 100)->nullable();
            $table->string('logo', 100)->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->string('representant', 100)->nullable();
            $table->string('telephone1', 45)->nullable();
            $table->string('telephone2', 45)->nullable();
            $table->string('telephone3', 45)->nullable();

            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}