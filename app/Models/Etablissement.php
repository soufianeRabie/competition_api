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

    public function actions ()
    {
        return $this->hasMany(Action::class , 'etablissements_id')->with(['entreprise' ,'etablissement' , 'intervenant' ,'theme']);
    }


    public function intervenant ()
    {
        return $this->hasOne(Intervenant::class , 'etablissements_id');
    }
    // Define relationships if any
}
