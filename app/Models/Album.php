<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['titulo','foto'];

    function canciones(){
        return $this->belongsToMany(Cancion::class);
    }

    function artistas(){
        return $this->belongsToMany(Artista::class);
    }
}
