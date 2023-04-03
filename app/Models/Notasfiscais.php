<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'mes_competencia',
        'ano_competencia',
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function contrato(){
        return $this->belongsTo(Contrato::class, 'contrato_id', 'id');
    }


}
