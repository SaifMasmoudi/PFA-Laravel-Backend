<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    protected $fillable = ['nom_groupe','id_niveau'];
    public function niveaux()
    {
        return $this->belongsTo(Niveau::class,"id_niveau");
    }

}
