<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    protected $fillable = ['nom_examen','date_examen','heure_debut','heure_fin','id_niveau_matiere'];


    public function niveau_matieres()
    {
        return $this->belongsTo(NiveauMatiere::class,"id_niveau_matiere");
    }
}