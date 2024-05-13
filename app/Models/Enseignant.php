<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = ['nom_enseignant','prenom_enseignant','num_tel','email'];

    public function primes()
    {
        return $this->hasMany(Prime::class ,"id_enseignant");
    }
    public function conges()
    {
        return $this->hasMany(Conge::class ,"id_enseignant");
    }

    public function charge_horaires()
    {
        return $this->hasMany(ChargeHoraire::class);
    }
}
