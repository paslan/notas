<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    public function empresa() :BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function notas() :HasMany
    {
        return $this->HasMany(Notasfiscais::class);
    }

}
