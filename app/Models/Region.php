<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'nom_region', 'created_at', 'updated_at'
    ];

    public function etablisments()
    {
        return $this->hasMany(Etablissement::class , 'regions_id')->with('actions');
    }

    // Define relationships if any
}
