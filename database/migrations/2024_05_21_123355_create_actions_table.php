<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('exercice')->nullable();
            $table->unsignedBigInteger('entreprises_id');
            $table->unsignedBigInteger('themes_id');
            $table->unsignedBigInteger('Intervenants_id');
            $table->unsignedBigInteger('etablissements_id');
            $table->dateTime('date_debut_prev')->nullable();
            $table->dateTime('date_fin_prev')->nullable();
            $table->float('prix_reel')->nullable();
            $table->dateTime('date_fin_real')->nullable();
            $table->dateTime('date_debut_real')->nullable();
            $table->integer('nbparticipants')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('entreprises_id')->references('id')->on('entreprises');
            $table->foreign('themes_id')->references('id')->on('themes');
            $table->foreign('Intervenants_id')->references('id')->on('intervenants');
            $table->foreign('etablissements_id')->references('id')->on('etablissements');
        });
    }

    public function down()
    {
        Schema::dropIfExists('actions');
    }
}