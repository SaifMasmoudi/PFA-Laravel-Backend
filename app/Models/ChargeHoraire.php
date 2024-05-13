<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeHoraire extends Model
{
    use HasFactory;
    protected $fillable = ['nb_heure','id_niveau_matiere', 'id_enseignant'];



    public function niveau_matieres()
    {
        return $this->belongsTo(NiveauMatiere::class,"id_niveau_matiere");
    }


    public function enseignants()
    {
        return $this->belongsTo(Enseignant::class,"id_enseignant");
    }

    public function annee_universitaires()
    {
        return $this->hasMany(AnneeUniversitaire::class ,"id_charge_horaire");
    }

}
