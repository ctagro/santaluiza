<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesa;
use App\Models\Origem;
use App\User;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ReceitaController extends Controller
{
    public function index()
    {

    $despesas = auth()->user()->despesa()->get();

    $origems = auth()->user()->origem()->get();
    
    return view('financeiro.receita.index', compact('despesas', 'origems'));

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
      
        $origems = auth()->user()->origem()->get();

        return view('financeiro.receita.edit',compact('despesa','origems'));
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
        
         $dataRequest = $request; 
 
       

         if ($dataRequest['date'] == null){
            $dataP = explode('/',$despesa->date);
            $data['date'] = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
         }
         else {           
            $data['date'] = $dataRequest['date'];
         }

         $data['origem_id'] = $dataRequest['origem_id'];
         $data['descricao'] = $dataRequest['descricao'];
         $data['valor'] = $dataRequest['valor'];

        $despesa -> update($data);

        return redirect('financeiro/receita/index');
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

    
    private function validateRequest() 
    {

        return request()->validate([

            //    'date'          => 'required', 
                'origem_id'     => 'required', 
                'descricao'     => 'required',
                'valor'         => 'required',

       ]);
    }

}
