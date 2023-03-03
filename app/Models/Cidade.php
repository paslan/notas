<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cities';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'estado_id',
    ];

    public function Estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

}
