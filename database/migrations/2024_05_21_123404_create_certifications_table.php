<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationsTable extends Migration
{
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('domaines_id');
            $table->unsignedBigInteger('Intervenants_id');
            $table->string('intiltule_certification', 45)->nullable();
            $table->string('organisme_certification', 45)->nullable();
            $table->string('type_certification', 45)->nullable();
            $table->timestamps();

            $table->foreign('domaines_id')->references('id')->on('domaines');
            $table->foreign('Intervenants_id')->references('id')->on('intervenants');
        });
    }

    public function down()
    {
        Schema::dropIfExists('certifications');
    }
}