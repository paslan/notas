<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'states';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'abbr'
    ];

    public function Cidades(){
        return $this->hasMany(Cidade::class, 'id');
    }
}
