<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesa_conta;
use App\Models\Despesa;
use App\User;
use App\Models\Origem;
use Illuminate\Support\Facades\Validator;

class Despesa_contaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Despesa_conta $despesa_conta)
    {

        $despesa_contas = auth()->user()->despesa_conta()->get();

        $origems = Origem::All();

  

       //

        return view('financeiro.despesa_conta.index', compact('despesa_contas','origems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDespesa_conta(Request $request)
    {
        // instaciando $despesa_conta com objeto do Model Despesa_conta

        $data = $this->validateRequest();

        
        $despesa_conta = new despesa_conta();

        // Chamando a objeto a funcao do model despesa_conta e passando o array 
        // capiturado no formulario da view financeiro/despesa_conta

        $response = $despesa_conta->storeDespesa_conta($request->all());


        if ($response['sucess'])

            return redirect()
                        ->route('despesa_conta.index')
                        ->with('sucess', $response['mensage']);
                    

        return redirect()
                    ->back()
                    ->with('error', $response['mensage']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Despesa_conta  $despesa_conta
     * @return \Illuminate\Http\Response
     */
    public function show(Despesa_conta $despesa_conta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Despesa_conta  $despesa_conta
     * @return \Illuminate\Http\Response
     */
    public function edit(Despesa_conta $despesa_conta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Despesa_conta  $despesa_conta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Despesa_conta $despesa_conta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Despesa_conta  $despesa_conta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Despesa_conta $despesa)
    {
        //
    }

    public function fluxodecaixa()
    {
      
       // $historics = auth()->user()->historics()->with(['userSender'])->get();

       // paginando a consulta

       $despesa_contas = auth()->user()->despesa_conta()->get();



       $origems = Origem::all();


        return  view('financeiro.fluxoDeCaixa', compact('despesa_contas','origems'));
    }

    public function searchHistoric(Request $request, Despesa_conta $despesa_conta)
    {
        $dataForm = $request->except('_token'); // para evitar a passagem do token na mudança de pagina

        $historics = $despesa_conta->search($dataForm, $this->totalPage);

        $types = $despesa_conta->type();

        $origems = Origem::All();

        return  view('financeiro/fluxodecaixa', compact('despesas', 'types' , 'dataForm', 'origems'));

    }

    private function validateRequest() 
    {

        return request()->validate([

               'origem_id'     => 'required', 
               'descricao'     => 'required',
               'valor'         => 'required',

       ]);
    }
}
