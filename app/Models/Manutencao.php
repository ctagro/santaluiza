<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTime;
use DB;
use App\User;
use App\Models\Origem;

class Manutencao extends Model
{
    protected $fillable = [ 
    
        'user_id',
        'date',
        'type',
        'origem_id', 
        'descricao',
        'date',
        'valor',
        'validade',
        'updated_at',
        'created_at'
    ];

      /*********************************
     * Formatando a data como dia mes e ano
     ******************************/
     
    
    public function getDateAttribute($value)
     {
         return Carbon::parse($value)->format('d/m/Y');
     }

     public function origem()
    {
        return $this -> belongsTo(Origem::class);
    }

     

     

      /*********************************
     * Registrando as despesas e os saldos
     ******************************/

    public function storeDespesa(array $data): Array
    {


 // recebe o array do controller Despesa -> storeDespesa e grava na tabela

       
            $despesa = auth()->user()->despesa()->create([

                'type'          => 'D',
                'origem_id'     => $data['origem_id'], 
                'descricao'     => $data['descricao'],
                'date'          => $data['date'],
                'valor'         => $data['valor'],
                'validade'      => 'S'

                ]);
   
       if($despesa){

            DB::commit();

            return[
                'sucess' => true,
                'mensage'=> 'Despesa registrada com sucesso'
            ];

            }

       else {

            DB::rollback();

            return[
                    'sucess' => false,
                    'mensage'=> 'Falha ao registrar a receita'
            ];
            }

    }

      /*********************************
     * Registrando nova receita e o saldo
     ******************************/

    public function storeReceita(array $data): Array
    {
       
            $despesa = auth()->user()->despesa()->create([

                'type'          => 'R',
                'origem_id'        => $data['origem_id'], 
                'descricao'     => $data['descricao'],
                'date'          => $data['date'],
                'valor'         => $data['valor'],
                'validade'      => 'S'

         ]);

       if($despesa){

            DB::commit();

            return[
                'sucess' => true,
                'mensage'=> 'Receita registrada com sucesso'
            ];

            }

       else {

            DB::rollback();

            return[
                    'sucess' => false,
                    'mensage'=> 'Falha ao registrar a receita'
            ];
        }
    }

          /*********************************
     * Registrando nova receita e o saldo
     ******************************/

    public function storeInvestimento(array $data): Array
    {       
                    $despesa = auth()->user()->despesa()->create([
        
                        'type'          => 'I',
                        'origem_id'        => $data['origem_id'], 
                        'descricao'     => $data['descricao'],
                        'date'          => $data['date'],
                        'valor'         => $data['valor'],
                        'validade'      => 'S'
        
                 ]);
        
               if($despesa){
        
                    DB::commit();
        
                    return[
                        'sucess' => true,
                        'mensage'=> 'Receita registrada com sucesso'
                    ];
        
                    }
        
               else {
        
                    DB::rollback();
        
                    return[
                            'sucess' => false,
                            'mensage'=> 'Falha ao registrar a receita'
                    ];
                    }

    }

    public function storePrimeiro()
    {
       
            $despesa = auth()->user()->despesa()->create([

                'type'          => 'R',
                'origem_id'        => 1, 
                'descricao'     => "Saldo inicial",
                'date'          => "2000-01-01",
                'valor'         => 0,
                'validade'      => 'S'

         ]);
        }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
