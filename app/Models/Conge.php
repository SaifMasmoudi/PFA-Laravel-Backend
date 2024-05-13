<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    protected $fillable = ['type_conge','date_debut','date_fin','id_enseignant'];
    public function enseignants()
    {
        return $this->belongsTo(Enseignant::class,"id_enseignant");
    }
}