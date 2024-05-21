<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'domaines_id', 'Intervenants_id', 'intiltule_certification', 'organisme_certification',
        'type_certification', 'created_at', 'updated_at'
    ];

    public function domaine()
    {
        return $this->belongsTo(Domaine::class, 'domaines_id');
    }

    public function intervenant()
    {
        return $this->belongsTo(Intervenant::class, 'Intervenants_id');
    }
}