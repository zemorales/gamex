<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;
    protected $table = 'torneos';
    protected $fillable = ['nombre_torneo','precio_visitante', 'precio_competidor', 'juego_id', 'categoria_id','fecha'];

    public function juego()
    {
        return $this->belongsTo(Juego::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function boletos()
    {
        return $this->hasMany(Boleto::class);
    }
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'torneos_has_usuarios', 'torneo_id', 'user_id')
        ->withPivot('torneo_id','user_id','tipo_usuario')->withTimestamps();
    }
}
