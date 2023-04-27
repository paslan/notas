<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Notasfiscais extends Model
{
    use HasFactory;

    protected $table = 'notasfiscais';

    protected $primaryKey = 'id';

    protected $fillable = [
        'empresa_id',
        'contrato_id',
        'nronf',
        'data_emissao',
        'data_vencto',
        'data_pagto',
        'mes_competencia',
        'ano_competencia',
        'competencia',
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function processo(): HasOne
    {
        return $this->hasOne(Processo::class);
    }


}
