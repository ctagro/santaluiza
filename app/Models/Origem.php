<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Despesa;
use App\Models\Despesa_conta;

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

    public function despesa_conta()
    {
        return $this->belongsTo(despesa_conta::class);
    }
}
