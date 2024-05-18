<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;
    protected $fillable = ['heure'];

    public function emplois()
    {
    return $this->hasMany(Emploi::class ,"id_heure");
    }
}
