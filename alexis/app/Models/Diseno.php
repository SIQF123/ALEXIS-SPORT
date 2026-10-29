<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diseno extends Model
{
    protected $table = 'disenos';

    protected $fillable = [
        'prenda',
        'talla',
        'color_principal',
        'color_detalles',
        'estampado',
        'texto',
        'notas',
    ];
}