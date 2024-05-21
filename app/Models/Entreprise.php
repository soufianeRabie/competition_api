<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'raison', 'email', 'site', 'logo', 'status', 'created_at', 'update_at',
        'representant', 'telephone1', 'telephone2', 'telephone3'
    ];

    // Define relationships if any
}