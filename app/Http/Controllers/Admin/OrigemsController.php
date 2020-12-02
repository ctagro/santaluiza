<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Telefone;
use App\User;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\Models\Origem;


class OrigemsController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $origems = auth()->user()->origem()->get();

    // $origems = Origem::all();

    // dd($origems);   

        return view('origems.index', ['origems' => $origems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $user = auth()->user();

        $origem = new \App\Models\Origem([


        ]);

        return view('origems.create',compact('origem'));
       
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrigem(Request $request)
    {
        // instaciando $despesa com objeto do Model Despesa

        $data = $this->validateRequest();

        
        $origem = new origem();

        // Chamando a objeto a funcao do model despesa e passando o array 
        // capiturado no formulario da view financeiro/despesa

        $response = $origem->storeOrigem($request->all());



        if ($response['sucess'])

            return redirect()
                        ->route('origems.index')
                        ->with('sucess', $response['mensage']);
                    

        return redirect()
                    ->back()
                    ->with('error', $response['mensage']);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(origem $origem)
    {

      //  $user_login_id = auth()->user()->id;
      //  $user = auth()->user();

      $origems = auth()->user()->origem()->get();


        return view('origems.show', compact('origem' ));



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(origem $origem) {


        $user = auth()->user();


        return view('origems.edit',['origem' => $origem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(origem $origem)
    {

        $data = $this->validateRequest();

        $origem -> update($data);

        return redirect('/origems');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(origem $origem)
    {
        $origem->delete();

        return redirect('origems');
    }

    private function validateRequest()
    {

        return request()->validate([

            'codigo'=> 'required',
            'descricao'=> 'required',
            'em_uso' => 'required',
    
       ]);


    }
}

