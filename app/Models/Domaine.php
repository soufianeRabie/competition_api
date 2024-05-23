<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_domaine', 'status', 'created_at', 'updated_at'
    ];


    public  function theme()
    {
        return $this->hasMany(Theme::class , );
    }
}

