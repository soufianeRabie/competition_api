<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('user_id')->constrained(); // Foreign Key to Users
            $table->string('prenom')->nullable(); // First Name
            $table->string('nom')->nullable(); // Last Name
            $table->date('date_de_naissance')->nullable(); // Date of Birth
            $table->enum('genre', ['male', 'female',]); // Gender
            $table->string('adresse')->nullable(); // Address
            $table->string('telephone')->nullable(); // Phone
            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
