<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_jour','id_heure','id_salle','id_annee','id_charge_horaire'];


    

    public function annee_universitaires()
    {
        return $this->belongsTo(AnneeUniversitaire::class, 'nom_annee');
    }

    public function salles()
    {
        return $this->belongsTo(Salle::class,"id_salle");
    }
    public function jours()
    {
        return $this->belongsTo(Jour::class,"id_jour");
    }
    public function horaires()
    {
        return $this->belongsTo(Horaire::class,"id_heure");
    }

    public function charge_horaires()
    {
        return $this->belongsTo(ChargeHoraire::class,"id_charge_horaire");
    }
}
