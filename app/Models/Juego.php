<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;
    protected $table = 'juegos';
    protected $fillable = [
        'nombre_juego',
        'cantidad_jugadores',        
    ];
    function torneos(){
        return $this->hasMany(Torneo::class);
    }
}
