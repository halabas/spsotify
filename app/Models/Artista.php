<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    function canciones(){
        return $this->belongsToMany(Cancion::class);
    }
    function albumes(){
        return $this->belongsToMany(Cancion::class);
    }
}
