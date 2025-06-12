<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

      protected $fillable = [
        'nom',
        'secteur_id',
        'code_postal',
        'ville',
        'chiffre_affaires',
    ];

    public function secteur()
    {
        return $this->belongsTo(SecteurActivite::class, 'secteur_id');
    }

    public function personnes()
    {
        return $this->hasMany(Personne::class);
    }
}
