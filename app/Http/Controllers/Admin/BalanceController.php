<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\Models\User;
use App\Models\Historic;

class BalanceController extends Controller
{
    private $totalPage = 5;
    
    
    
    public function index()
    {

        $balance = auth()->User()->balance;
        $amount = $balance ? $balance->amount : 0;

        return  view('admin.balance.index', compact('amount'));
    }

    public function deposit()
    {
        return  view('admin.balance.deposit');
    }



    public function depositStore(MoneyValidationFormRequest $request)
    {
    
        
        $balance = auth()->user()->balance()->firstOrCreate([]); 
        

        // relaciona o user logado com o balance 
        // pegando no model user o relacionamento definido no metodo balance. $balance é um objeto de balance()
        //$balance->deposit($request->value); // vai para o model balance e metodo deposit passando a variável
        // $value capturando a variavel enviada pelo formulario do deposit.blade.php considerando a rota depositStore
        $response = $balance->deposit($request->value);
        

        if ($response['sucess'])

            return redirect()
                        ->route('admin.balance')
                        ->with('sucess', $response['mensage']);
                    

        return redirect()
                    ->back()
                    ->with('error', $response['mensage']);

    }

    public function withdraw()
    {
    
        return  view('admin.balance.withdraw');
    }


public function whithdrawStore(MoneyValidationFormRequest $request)
   
{       
          
        $balance = auth()->user()->balance()->firstOrCreate([]); 
        $withdraw = $balance->withdraw($request->value);
        

        if ($withdraw['sucess'])

            return redirect()
                        ->route('admin.balance')
                        ->with('sucess', $withdraw['mensage']);
                    

            return redirect()
                    ->back()
                    ->with('error', $withdraw['mensage']);

    }

    public function transfer()
    {
    
        return  view('admin.balance.transfer');
    }


public function confirmTransfer(Request $request, User $user)
   
{       
          
       // $balance = auth()->user()->balance()->firstOrCreate([]); 
        if (!$sender = $user->getSender($request->sender))
            return redirect()
                      ->back()
                      ->with('erro', 'Usuário informado não encontrado!');
       
        if ($sender->id === auth()->user()->id)
            return redirect()
                      ->back()
                      ->with('erro', 'Não pode ser transferido para o você mesmo!');

        $balance = auth()->user()->balance;


        return view('admin.balance.transfer-confirm', compact('sender', 'balance'));
    
    }

    public function transferStore(MoneyValidationFormRequest $request, User $user)
    { 

        if (!$sender = $user->find($request->sender_id ))
            return redirect()
                        ->route('balance.transfer')
                        ->with('sucess', 'Recebedor não encontrado');



        $balance = auth()->user()->balance()->firstOrCreate([]); 
        $response = $balance->transfer($request->value, $sender);
        
        

        if ($response['sucess'])
            return redirect()
                        ->route('admin.balance')
                        ->with('sucess', $response['mensage']);
                    

        return redirect()
                    ->route('balance.transfer')
                    ->with('error', $response['mensage']);

    }

    public function historic(Historic $historic)
    {
       // $historics = auth()->user()->historics()->with(['userSender'])->get();

       // paginando a consulta

       $historics = auth()->user()
                        ->historics()
                        ->with(['userSender'])
                        ->paginate($this->totalPage);

        $types = $historic->type();


        return  view('admin.balance.historic', compact('historics', 'types'));
    }

    public function searchHistoric(Request $request, Historic $historic)
    {
        $dataForm = $request->except('_token'); // para evitar a passagem do token na mudança de pagina

        $historics = $historic->search($dataForm, $this->totalPage);

        $types = $historic->type();

        return  view('admin.balance.historic', compact('historics', 'types' , 'dataForm'));

    }



}