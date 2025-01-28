<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComisionBoleto extends Model
{
    use HasFactory;
    protected $table = 'comision_boleto';
    protected $fillable = ['valor_comision','porcentaje_cobrado','categoria_comision_id','boleto_id'];

    public function boleto()
    {
        return $this->belongsTo(Boleto::class, 'boleto_id');
    }
}
