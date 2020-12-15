<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesa;
use App\User;
use App\Models\Origem;
use App\Models\Manutencao;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ManutencaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $despesas = despesa::all();

       $origems = origem::all();


        return view('admin.manutencao.index', compact('despesas','origems'));
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
        $origems = auth()->user()->origem()->get();

        return view('admin.manutencao.show',compact('despesa','origems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Despesa $despesa)
    {


        $origems = origem::all();
        $users = user::all();




        return view('admin.manutencao.edit',compact('despesa','origems','users'));
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
         $data['type'] = $dataRequest['type'];
         $data['user_id'] = $dataRequest['user_id'];
         $data['origem_id'] = $dataRequest['origem_id'];
         $data['descricao'] = $dataRequest['descricao'];
         $data['valor'] = $dataRequest['valor'];

        $despesa -> update($data);

        return redirect('admin/manutencao/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
   
        public function destroy(despesa $despesa)
    {

        dd($despesa);
        $despesa->delete();

        return redirect('admin/manutencao/index');
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

            'date'          => 'required', 
            'origem_id'     => 'required', 
            'descricao'     => 'required',
            'valor'         => 'required',

       ]);
    }
}
