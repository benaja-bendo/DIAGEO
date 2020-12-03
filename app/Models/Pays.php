<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;

    protected $fillable=[
      'nom'
    ];

    public function ville()
    {
        return $this->hasMany('App\Models\Ville');
    }

}
