<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;
use App\Models\Origem;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $despesas = auth()->user()->despesa()->get();

        $origems = auth()->user()->origem()->get();

       // dd($despesas,$origems);

        if($despesas->count() == 0){

            $despesa = new despesa(); 

            $response_despesa = $despesa->storePrimeiro();

            $origem = new origem(); 

            $response_origem = $origem->storePrimeiro();
    
         }

        return view('admin.home.index');
    }

    public function galeria()
    {
        return view('site.galeria.galeria');
    }
}
