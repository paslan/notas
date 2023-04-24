<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userparam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'custo_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function custo()
    {
        return $this->belongsTo(Custo::class);
    }
}
