<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaComision extends Model
{
    use HasFactory;
    protected $table = 'categorias_comision';
    protected $fillable = ['nombre_categoria','porcentaje'];
}
