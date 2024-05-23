<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeIntervenant extends Model
{
    use HasFactory;

    protected $table = 'theme_intervenant';

    protected $fillable = [
        'theme_id',
        'intervenant_id',
        'type_intervenant',
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function intervenant()
    {
        return $this->belongsTo(Intervenant::class);
    }
}