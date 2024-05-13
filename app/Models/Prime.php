<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prime extends Model
{
    use HasFactory;
    protected $fillable = ['montant_prime','id_enseignant'];
    public function enseignants()
    {
        return $this->belongsTo(Enseignant::class,"id_enseignant");
    }
}
