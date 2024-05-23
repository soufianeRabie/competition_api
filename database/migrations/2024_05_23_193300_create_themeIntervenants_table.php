<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeIntervenantsTable extends Migration
{
    /**ah
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_intervenant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained('themes')->onDelete('cascade');
            $table->foreignId('intervenant_id')->constrained('intervenants')->onDelete('cascade'); // Assuming 'intervenants' is the table name for intervenants
            $table->string('type_intervenant');
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
        Schema::dropIfExists('theme_intervenant');
    }
}