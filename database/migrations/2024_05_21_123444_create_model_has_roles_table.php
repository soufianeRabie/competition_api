<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelHasRolesTable extends Migration
{
    public function up()
    {
        Schema::create('model_has_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('model_id');
            $table->string('model_type', 255);

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->index(['model_id', 'model_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_has_roles');
    }
}