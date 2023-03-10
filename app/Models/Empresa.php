<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Empresa extends Model
{
    protected $fillable = [
        'nome',
        'razao_social',
        'cnpj',
        'endereco',
        'nro',
        'complemento',
        'bairro',
        'uf',
        'cidade',
    ];

}
