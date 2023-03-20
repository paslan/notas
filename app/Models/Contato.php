<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'nome',
        'email1',
        'email2',
        'telefone1',
        'telefone2',
    ];


    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

}
