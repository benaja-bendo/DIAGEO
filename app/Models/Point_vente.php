<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point_vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'telephone1',
        'telephone2',
        'email',
        'geolocalisation_id',
        'type_point_vente_id',
    ];
}
