<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'domaines_id', 'intitule_theme', 'duree_formation', 'status', 'created_at', 'updated_at'
    ];

    // Define relationships if any
}