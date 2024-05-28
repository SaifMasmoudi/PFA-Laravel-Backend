<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauMatiere extends Model
{
    use HasFactory;
    protected $fillable = ['id_niveau', 'id_matiere'];

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'id_niveau');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'id_matiere');
    }

    public function chargeHoraires()
    {
        return $this->hasMany(ChargeHoraire::class, 'id_niveau_matiere');
    }
}
