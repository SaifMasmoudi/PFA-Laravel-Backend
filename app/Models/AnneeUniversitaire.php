<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeUniversitaire extends Model
{
    use HasFactory;
    protected $primaryKey = 'nom_annee';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nom_annee', 'semester'];

    
    public function emplois()
    {
    return $this->hasMany(Emploi::class ,"id_annee");
    }
}
