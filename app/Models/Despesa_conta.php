<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTime;
use DB;
use App\User;

class Despesa_conta extends Model
{
    //  use HasFactory;

    protected $fillable = [ 
    
        'user_id',
        'type',
        'origem_id', 
        'descricao',
        'date',
        'total_before',
        'total_after',
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
     * Registrando as despesa_contas e os saldos
     ******************************/

    public function storeDespesa_conta(array $data): Array
    {


       $lastDespesa_conta = auth()->user()->despesa_conta()->latest()->first();

  

       //dd($lastDespesa_conta);

       if($lastDespesa_conta){

        $lastValor = $lastDespesa_conta->total_after;

        $afterValor = $lastValor - $data['valor'];



      // dd($data['valor'],$lastValor,$afterValor);
       
            $despesa_conta = auth()->user()->despesa_conta()->create([

                'type'          => 'D',
                'origem_id'     => $data['origem_id'], 
                'descricao'     => $data['descricao'],
                'date'          => date('Y/m/d'),
                'total_before'  => $lastValor,
                'total_after'   => $afterValor,
                'valor'         => $data['valor'],
                'validade'      => 'S'

         ]);
     //    dd($data['valor']);
            }

         else{

            $despesa_conta = auth()->user()->despesa_conta()->create([
                'type'          => 'D',
                'origem_id'        => $data['origem_id'], 
                'descricao'     => $data['descricao'],
                'total_before'   => 0,
                'total_after'    => -$data['valor'],
                'date'          => date('Y/m/d'),
                'valor'         => $data['valor'],
                'validade'      => 'S'  
                ]);
               
        
    }
       if($despesa_conta){

            DB::commit();

            return[
                'sucess' => true,
                'mensage'=> 'Despesa_conta registrada com sucesso'
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

    public function storeReceita_conta(array $data): Array
    {


       $lastReceita = auth()->user()->despesa_conta()->latest()->first();

       //dd($lastDespesa_conta);

       if($lastReceita){

        $lastValor = $lastReceita->total_after;

        $afterValor = $lastValor + $data['valor'];

    
       
            $despesa_conta = auth()->user()->despesa_conta()->create([

                'type'          => 'R',
                'origem_id'        => $data['origem_id'], 
                'descricao'     => $data['descricao'],
                'date'          => date('Y/m/d'),
                'total_before'  => $lastValor,
                'total_after'   => $afterValor,
                'valor'         => $data['valor'],
                'validade'      => 'S'

         ]);

            }

         else{

            $despesa_conta = auth()->user()->despesa_conta()->create([
                'type'          => 'R',
                'origem_id'        => $data['origem_id'], 
                'descricao'     => $data['descricao'],
                'total_before'   => 0,
                'total_after'    => $data['valor'],
                'date'          => date('Y/m/d'),
                'valor'         => $data['valor'],
                'validade'      => 'S'  
                ]);
        
    }
       if($despesa_conta){

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
