<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->string('nom_region', 100)->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
        });

        // Insert initial data
        DB::table('regions')->insert([
            ['id' => 1, 'nom_region' => 'CASA SETTAT', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nom_region' => 'RABAT SALE KENITRA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nom_region' => 'ORIENTAL', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nom_region' => 'FES MEKNES', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'nom_region' => 'MARRAKECH SAFI', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'nom_region' => 'TANGER TETOUAN AL HOUCEIMA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'nom_region' => 'SOUSS MASSA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'nom_region' => 'LAAYOUNE SAKIA EL HAMRA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'nom_region' => 'DAKHLA OUED EDDAHAB', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'nom_region' => 'BENI MELLAL KHENIFRA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'nom_region' => 'DRAA TAFILALET', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'nom_region' => 'GUELMIM OUED NOUN', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('regions');
    }
}