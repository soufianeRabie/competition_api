<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercice', 'entreprises_id', 'themes_id', 'Intervenants_id', 'etablissements_id',
        'date_debut_prev', 'date_fin_prev', 'prix_reel', 'date_fin_real', 'date_debut_real',
        'nbparticipants', 'status', 'created_at', 'updated_at'
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprises_id');
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'themes_id');
    }

    public function intervenant()
    {
        return $this->belongsTo(Intervenant::class, 'Intervenants_id');
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'etablissements_id');
    }
}