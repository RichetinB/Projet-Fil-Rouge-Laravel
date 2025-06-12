<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    protected $with = ['civilite', 'localisation', 'entreprise'];

    protected $fillable = [
        'civilite_id',
        'nom',
        'prenom',
        'email',
        'telephone',
        'localisation_id',
        'entreprise_id'
    ];

    public function civilite()
    {
        return $this->belongsTo(Civilite::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function localisation()
    {
        return $this->belongsTo(Localisation::class);
    }


}

