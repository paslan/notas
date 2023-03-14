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
    ];

}
