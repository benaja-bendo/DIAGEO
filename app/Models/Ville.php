<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom',
        'pays_id'
    ];

    public function pays()
    {
        return $this->belongsTo('App\Models\Pays');
    }

    public function arrondissement()
    {
        return $this->hasMany('App\Models\Arrondissement');
    }
}
