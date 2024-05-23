<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'etablissements_id', 'users_id', 'matricule', 'nom', 'datenaissance', 'intitule_diplome',
        'type_diplome', 'specialite_diplome', 'type_intervenant', 'status', 'created_at', 'updated_at'
    ];


public function etablisment()
{
    return $this->belongsTo(Etablissement::class , 'id' , 'etablissements_id');
}// Define relationships if any


    public function user()
    {
        return $this->belongsTo(User::class , 'id' , 'users_id');
    }
}
