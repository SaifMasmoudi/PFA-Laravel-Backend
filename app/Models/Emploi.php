<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;
    
    protected $fillable = ['jour','heure_debut','heure_fin','id_salle','id_annee'];


    

    public function annee_universitaires()
    {
        return $this->belongsTo(AnneeUniversitaire::class,"id_annee");
    }

    public function salles()
    {
        return $this->belongsTo(Salle::class,"id_salle");
    }
}
