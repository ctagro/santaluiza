<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesa;
use App\Models\Origem;
use App\User;

class ReceitaController extends Controller
{
    public function index(Despesa $despesa)
    {

    $despesas = auth()->user()->despesa()->get();

    $origems = auth()->user()->origem()->get();

    
    return view('financeiro.receita.index', compact('despesas', 'origems'));

    }

    public function storeReceita(Request $request)
    {
        // instaciando $despesa com objeto do Model Despesa

        $data = $this->validateRequest();
        
        $receita = new despesa();

        // Chamando a objeto a funcao do model despesa e passando o array 
        // capiturado no formulario da view financeiro/despesa

        $response = $receita->storeReceita($request->all());


        if ($response['sucess'])

            return redirect()
                        ->route('receita.index')
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
