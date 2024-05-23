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


    public function domain()
    {
        return $this->belongsTo(Domaine::class , 'domaines_id' , 'id');
    }

    public function plans()
    {
        return $this->hasMany(Plan::class , 'themes_id' , 'id');
    }




    // Define relationships if any
}
