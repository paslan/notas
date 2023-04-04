<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;

    protected $table = 'processos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'notasfiscais_id',
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

    public function nota(): HasOne
    {
        return $this->hasOne(Nota::class);
    }

}
