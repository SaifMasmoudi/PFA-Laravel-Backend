<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeUniversitaire extends Model
{
    use HasFactory;
    protected $fillable = ['nom_annee','id_charge_horaire'];

    public function charge_horaires()
    {
        return $this->belongsTo(ChargeHoraire::class,"id_charge_horaire");
    }
}
