<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'regions_id', 'nom_efp', 'adresse', 'tel', 'ville', 'status', 'updated_at', 'created_at'
    ];

    // Define relationships if any
}