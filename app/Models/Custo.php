<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custo extends Model
{
    use HasFactory;

    protected $fillable = [
        'ccusto',
        'desc_ccusto',
    ];

    public function parametro()
    {
        return $this->hasMany(Userparam::class);
    }

}
