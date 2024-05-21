<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercice', 'etablissements_id', 'themes_id', 'nbjours', 'nbparticipantmaxi', 'cout_previsionnel',
        'status', 'created_at', 'updated_at'
    ];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'etablissements_id');
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'themes_id');
    }


}