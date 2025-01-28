<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreventaBoleto extends Model
{
    use HasFactory;
    protected $table = 'preventa_boletos';
    protected $fillable = ['fecha_inicio_prev','fecha_final_prev','valor_boleto', 'categoria', 'torneo_id'];
}
