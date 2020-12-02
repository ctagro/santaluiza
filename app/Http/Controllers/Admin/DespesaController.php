<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Despesa;
use App\Models\Despesa_conta;
use Illuminate\Http\Request;
use App\User;
use App\Models\Origem;
use Illuminate\Support\Facades\Validator;

class DespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Despesa $despesa)
    {

        $despesas = auth()->user()->despesa()->get();

        $origems = auth()->user()->origem()->get();

  

       //

        return view('financeiro.despesa.index', compact('despesas','origems'));
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
    public function storeDespesa(Request $request)
    {
        // instaciando $despesa com objeto do Model Despesa

        $data = $this->validateRequest();

        
        $despesa = new despesa();

        // Chamando a objeto a funcao do model despesa e passando o array 
        // capiturado no formulario da view financeiro/despesa

        $response = $despesa->storeDespesa($request->all());



        if ($response['sucess'])

            return redirect()
                        ->route('despesa.index')
                        ->with('sucess', $response['mensage']);
                    

        return redirect()
                    ->back()
                    ->with('error', $response['mensage']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function show(Despesa $despesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Despesa $despesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Despesa $despesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Despesa $despesa)
    {
        //
    }

    public function fluxodecaixa_futuro()
    {

        $despesas = auth()->user()->despesa()->orderBy('date')->get();

        // Necessario testar se há registro na tabela despesa_conta

        $ultimo_conta = auth()->user()->despesa_conta()->latest()->first();


       $origems = Origem::all();


        return  view('financeiro.fluxoDeCaixa_futuro', compact('despesas','origems','ultimo_conta'));
    }

    public function searchHistoric(Request $request, Despesa $despesa)
    {
        $dataForm = $request->except('_token'); // para evitar a passagem do token na mudança de pagina

        $historics = $despesa->search($dataForm, $this->totalPage);

        $types = $despesa->type();

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
