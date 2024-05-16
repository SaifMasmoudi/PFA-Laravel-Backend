<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;
    protected $fillable = ['num_salle', 'capacite'];

    public function emplois()
    {
    return $this->hasMany(Emploi::class ,"id_salle");
    }
}
