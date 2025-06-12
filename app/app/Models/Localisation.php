<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personne;

class Localisation extends Model
{
    use HasFactory;

    public function personnes()
    {
        return $this->hasMany(Personne::class);
    }

}
