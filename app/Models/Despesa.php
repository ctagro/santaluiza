<?php

namespace App\Models;
use Illuminate\Cache\ArrayLock;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTime;
use DB;
use App\User;

class Despesa extends Model
{
   //  use HasFactory;

    protected $fillable = [ 
    
        'user_id',
        'type',
        'origem', 
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

     

     public function origem($origem = null) // null torna a variavel opcional
     {
         $origems = [
             'A1' => 'Abacate área 1',
             'A2' => 'Abacate área 2',
             'P1' => 'Pimentão estufa 1',
             'P2' => 'Pimentão estufa 2',
             'P3' => 'Pimentão estufa 3',
             'C1' => 'Obra da casa',
         ];

         if (!$origem) // se nao for passado o parametro passa o array retorna todos os campos
            return $origems;

        return $origems[$origem]; // retorna valor correspondende do array
     }

      /*********************************
     * Registrando as despesas e os saldos
     ******************************/

    public function storeDespesa(array $data): Array
    {


       $lastDespesa = auth()->user()->despesa()->latest()->first();

       //dd($lastDespesa);

       if($lastDespesa){

        $lastValor = $lastDespesa->total_after;

        $afterValor = $lastValor - $data['valor'];

      //  dd($data['valor'],$lastValor,$afterValor);
       
            $despesa = auth()->user()->despesa()->create([

                'type'          => 'D',
                'origem'        => $data['origem'], 
                'descricao'     => $data['descricao'],
                'date'          => $data['date'],
                'total_before'  => $lastValor,
                'total_after'   => $afterValor,
                'valor'         => $data['valor'],
                'validade'      => 'S'

         ]);

            }

         else{

            $despesa = auth()->user()->despesa()->create([
                'type'          => 'D',
                'origem'        => $data['origem'], 
                'descricao'     => $data['descricao'],
                'total_before'   => 0,
                'total_after'    => $data['valor'],
                'date'          => $data['date'],
                'valor'         => $data['valor'],
                'validade'      => 'S'  
                ]);
        
    }
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


       $lastReceita = auth()->user()->despesa()->latest()->first();

       //dd($lastDespesa);

       if($lastReceita){

        $lastValor = $lastReceita->total_after;

        $afterValor = $lastValor + $data['valor'];

      //  dd($data['valor'],$lastValor,$afterValor);
       
            $despesa = auth()->user()->despesa()->create([

                'type'          => 'R',
                'origem'        => $data['origem'], 
                'descricao'     => $data['descricao'],
                'date'          => $data['date'],
                'total_before'  => $lastValor,
                'total_after'   => $afterValor,
                'valor'         => $data['valor'],
                'validade'      => 'S'

         ]);

            }

         else{

            $despesa = auth()->user()->despesa()->create([
                'type'          => 'R',
                'origem'        => $data['origem'], 
                'descricao'     => $data['descricao'],
                'total_before'   => 0,
                'total_after'    => $data['valor'],
                'date'          => $data['date'],
                'valor'         => $data['valor'],
                'validade'      => 'S'  
                ]);
        
    }
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
