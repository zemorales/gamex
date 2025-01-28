<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    use HasFactory;
    protected $table = 'boletos';
    protected $fillable = ['codigo_qr', 'activo', 'valor_boleto', 'torneo_id', 'user_id'];

    public function torneo()
    {
        return $this->belongsTo(Torneo::class);

        //para probar el commit
    }

    public function comisiones()
    {
        return $this->hasMany(ComisionBoleto::class, 'boleto_id');
    }
}
