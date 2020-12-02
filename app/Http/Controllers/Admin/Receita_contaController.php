<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Despesa_conta;
use Illuminate\Http\Request;
use App\User;
use App\Models\Origem;
use Illuminate\Support\Facades\Validator;

class Receita_contaController extends Controller
{
    public function index(Despesa_conta $despesa_conta)
    {

    $despesa_contas = auth()->user()->despesa_conta()->get();

    $origems = auth()->user()->origem()->get();

    
    return view('financeiro.receita_conta.index', compact('despesa_contas', 'origems'));

    }

    public function storeReceita_conta(Request $request)
    {
        // instaciando $despesa_conta com objeto do Model Despesa_conta

        $data = $this->validateRequest();
        
        $receita_conta = new despesa_conta();

        // Chamando a objeto a funcao do model despesa_conta e passando o array 
        // capiturado no formulario da view financeiro/despesa_conta

        $response = $receita_conta->storeReceita_conta($request->all());


        if ($response['sucess'])

            return redirect()
                        ->route('receita_conta.index')
                        ->with('sucess', $response['mensage']);
                    

        return redirect()
                    ->back()
                    ->with('error', $response['mensage']);

    }
    
    private function validateRequest() 
    {

        return request()->validate([

               'origem_id'        => 'required', 
               'descricao'     => 'required',
               'valor'         => 'required',

       ]);
    }
}
