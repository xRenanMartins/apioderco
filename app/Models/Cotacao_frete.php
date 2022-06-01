<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotacao_frete extends Model
{
    use HasFactory;

    protected $fillable = [
        'uf', 'percentual_cotacao', 'valor_extra', 'transportadora_id'
    ];
}
