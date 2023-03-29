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
        'estado_id',
        'cidade_id',
    ];

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    public function notasfiscais()
    {
        return $this->hasMany(Notasfiscais::class);
    }

    public function contatos()
    {
        return $this->hasMany(Contato::class);
    }

    public function propostas()
    {
        return $this->hasMany(Proposta::class);
    }


}
