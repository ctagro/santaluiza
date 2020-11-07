<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\User;



class Balance extends Model
{

    public function deposit(float $value): Array
    {
        // recebe a variável $value enviada pelo controle BalanceController 
       // dd($value);

       //dd($this->amount); // $this se refere à variavel do proprio Models 
       // no caso Balance (tabela Balance)


       DB::beginTransaction();
 

        $totalbefore = $this->amount ? $this->amount : 0;
       $this->amount += $value;
       $deposit = $this->save();

       $historic = auth()->user()->historics()->create([

        'type'           => 'I',
        'amount'         => $value,
        'total_before'   => $totalbefore,
        'total_after'    => $this->amount,
        'date'           => date('Ymd')

         ]);

       if($deposit && $historic){

            DB::commit();

            return[
                'sucess' => true,
                'mensage'=> 'Sucesso ao recarregar'
            ];

       }

       else {

            DB::rollback();

            return[
                    'sucess' => false,
                    'mensage'=> 'Falha ao recarregar'
            ];

    }

    }

    public function withdraw(float $value): Array
    {
        if($this->amount < $value)
           return [
                'sucess' => false,
                'mensage' => 'Saldo Insuficiente'
           ];

       //dd($this->amount); // $this se refere à variavel do proprio Models 
       // no caso Balance (tabela Balance)


       DB::beginTransaction();
       
      

        $totalbefore = $this->amount ? $this->amount : 0;
       $this->amount -= $value;
       $transfer = $this->save();

       $historic = auth()->user()->historics()->create([

        'type'           => 'O',
        'amount'         => $value,
        'total_before'   => $totalbefore,
        'total_after'    => $this->amount,
        'date'           => date('Ymd') 

         ]);

       if($transfer && $historic){

            DB::commit();

            return[
                'sucess' => true,
                'mensage'=> 'Sucesso ao retirar'
            ];

       }

       else {

            DB::rollback();

            return[
                    'sucess' => false,
                    'mensage'=> 'Falha ao retirar'
            ];

    }

    }


    public function transfer(float $value,  $sender): Array
    {

        if($this->amount < $value)
           return [
                'sucess' => false,
                'mensage' => 'Saldo Insuficiente'
           ];

       //dd($this->amount); // $this se refere à variavel do proprio Models 
       // no caso Balance (tabela Balance)


       DB::beginTransaction();
       
        /***************************************************
       * Atualiza o proprio saldo
       ************************************************ */

        $totalbefore = $this->amount ? $this->amount : 0;
       $this->amount -= $value;
       $transfer = $this->save();

       $historic = auth()->user()->historics()->create([

        'type'                  => 'T',
        'amount'                => $value,
        'total_before'          => $totalbefore,
        'total_after'           => $this->amount,
        'date'                  => date('Ymd'),
        'user_id_transaction'   => $sender->id

         ]);


        /***************************************************
       * Atualiza o saldo do recebedor
       ************************************************ */

        $senderBalance = $sender->balance()->firstOrCreate([]);
        $totalBeforeSender = $senderBalance->amount ? $senderBalance->amount : 0;
        $senderBalance->amount += $value;
        $transferSender = $senderBalance->save();
 
        $historicSender = $sender->historics()->create([
 
         'type'                  => 'I',
         'amount'                => $value,
         'total_before'          => $totalBeforeSender,
         'total_after'           => $senderBalance->amount,
         'date'                  => date('Ymd'),
         'user_id_transaction'   => auth()->user()->id
 
          ]);

       if($transfer && $historic && $transferSender && $historicSender){

            DB::commit();

            return[
                'sucess' => true,
                'mensage'=> 'Sucesso ao Transferir'
            ];

       }

       else {

            DB::rollback();

            return[
                    'sucess' => false,
                    'mensage'=> 'Falha ao Transferir'
            ];

       }

    }
}
