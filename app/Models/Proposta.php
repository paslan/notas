<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
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
        'contrato_id',
        'empresa_id',
    ];


    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }


}
