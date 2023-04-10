<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Processo extends Model
{
    use HasFactory;

    protected $table = 'processos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'notasfiscais_id',
        'empresa_id',
        'capa_C',
        'capa_I',
        'capa_G',
        'capa_T',
        'capa_P',
        'grafico1',
        'check_list',
        'controle_interno',
        'contrato',
    ];

    public function nota(): BelongsTo
    {
        return $this->belongsTo(Notasfiscais::class);
    }

}
