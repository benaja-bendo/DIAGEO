<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quartier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'arrondissement_id'
    ];

    public function arrondissement()
    {
        return $this->belongsTo('App\Models\Arrondissement');
    }
}
