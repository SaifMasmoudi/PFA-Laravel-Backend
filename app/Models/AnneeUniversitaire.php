<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeUniversitaire extends Model
{
    use HasFactory;
    protected $fillable = ['semestre'];

    
    public function emplois()
    {
    return $this->hasMany(Emploi::class ,"id_annee");
    }
}
