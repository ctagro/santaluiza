<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Despesa;

class Origem extends Model
{
    protected $fillable = [
        'codigo',
        'descricao',
        'em_uso'
    
];

public function despesa()
    {
        return $this->belongsTo(Despesa::class);
    }
}
