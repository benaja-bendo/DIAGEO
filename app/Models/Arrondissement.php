<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrondissement extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'nom_arrondissement',
        'ville_id',
    ];

    public function ville()
    {
        return $this->belongsTo('App\Models\Ville');
    }
}
