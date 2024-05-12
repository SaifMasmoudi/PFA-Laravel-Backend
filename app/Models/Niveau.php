<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    protected $fillable = ['nom_niveau'];

    public function groupes()
{
return $this->hasMany(Groupe::class ,"id_niveau");
}
public function niveaumatiere()
{
    return $this->hasMany(NiveauMatiere::class);
}

}
