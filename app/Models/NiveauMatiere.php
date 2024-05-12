<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauMatiere extends Model
{
    use HasFactory;
    protected $fillable = ['id_niveau', 'id_matiere'];

    public function niveaux()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function matieres()
    {
        return $this->belongsTo(Matiere::class);
    }
}
