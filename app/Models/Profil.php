<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prenom',
        'nom',
        'date_de_naissance',
        'genre',
        'adresse',
        'telephone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
