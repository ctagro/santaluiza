<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Despesa;
use App\Models\Despesa_conta;
use Carbon\Carbon;
use DateTime;
use DB;
use App\User;

class Origem extends Model
{
    protected $fillable = [
        'user_id',
        'codigo',
        'descricao',
        'em_uso'
    
];

public function storeOrigem(array $data): Array
    {

            $origem = auth()->user()->origem()->create([

                'codigo'          => $data['codigo'],
                'descricao'     => $data['descricao'],
                'em_uso'          => $data['em_uso'],

         ]);

         //dd($origem);
 
       if($origem){

            DB::commit();

            return[
                'sucess' => true,
                'mensage'=> 'Origem registrada com sucesso'
            ];

            }

       else {

            DB::rollback();

            return[
                    'sucess' => false,
                    'mensage'=> 'Falha ao registrar a origem'
            ];
            }

    }

    public function storePrimeiro()
    {

            $origem = auth()->user()->origem()->create([

                'codigo'          => "AP",
                'descricao'     =>  "Aporte",
                'em_uso'          => "S",

         ]);
    }

public function despesa()
    {
        return $this->belongsTo(Despesa::class);
    }

    public function despesa_conta()
    {
        return $this->belongsTo(despesa_conta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
