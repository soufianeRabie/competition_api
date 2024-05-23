<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = ['intervenant_id', 'name', 'description'];

    public function intervenant()
    {
        return $this->belongsTo(Intervenant::class);
    }
}