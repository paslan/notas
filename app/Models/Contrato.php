<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'objeto',
        'descricao',
        'data_assinatura',
        'assinado',
        'inicio_vigencia',
        'fim_vigencia',
        'valor',
        'empresa_id',
    ];


    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
