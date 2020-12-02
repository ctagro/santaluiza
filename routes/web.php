<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth']], function(){
  Route::get('admin/balance', [App\Http\Controllers\Admin\BalanceController::class, 'index'])->name('admin.balance');
  Route::get('admin/balance/deposit', [App\Http\Controllers\Admin\BalanceController::class, 'deposit'])->name('balance.deposit');
  Route::post('admin/balance/deposit', [App\Http\Controllers\Admin\BalanceController::class, 'depositStore'])->name('deposit.store');

  Route::post('admin/balance/withdraw', [App\Http\Controllers\Admin\BalanceController::class, 'whithdrawStore'])->name('withdraw.store');
  Route::get('admin/balance/withdraw', [App\Http\Controllers\Admin\BalanceController::class, 'withdraw'])->name('balance.withdraw');

  Route::get('admin/balance/transfer', [App\Http\Controllers\Admin\BalanceController::class, 'transfer'])->name('balance.transfer');
  Route::post('admin/balance/confirm-transfer', [App\Http\Controllers\Admin\BalanceController::class, 'confirmTransfer'])->name('confirm.transfer');
  Route::post('admin/balance/transfer', [App\Http\Controllers\Admin\BalanceController::class, 'transferStore'])->name('transfer.store');

  Route::get('admin/balance/historic', [App\Http\Controllers\Admin\BalanceController::class, 'historic'])->name('admin.historic');
  Route::any('admin/balance/historic-search', [App\Http\Controllers\Admin\BalanceController::class, 'searchHistoric'])->name('historic.search');

});

Route::get('site/profile/profile', [App\Http\Controllers\Admin\UserController::class, 'profile'])->name('profile')-> middleware('auth');
Route::post('site/profile/profile', [App\Http\Controllers\Admin\UserController::class, 'profileUpdate'])->name('profile.update')-> middleware('auth');

Route::get('financeiro/receita/index', [App\Http\Controllers\Admin\ReceitaController::class, 'index'])->name('receita.index')-> middleware('auth');
Route::post('financeiro/receita/store', [App\Http\Controllers\Admin\ReceitaController::class, 'storeReceita'])->name('receita.store')-> middleware('auth');


Route::get('financeiro/despesa/index', [App\Http\Controllers\Admin\DespesaController::class, 'index'])->name('despesa.index')-> middleware('auth');
Route::post('financeiro/despesa/store', [App\Http\Controllers\Admin\DespesaController::class, 'storeDespesa'])->name('despesa.store')-> middleware('auth');


// conta ...

Route::get('financeiro/receita_conta/index', [App\Http\Controllers\Admin\Receita_contaController::class, 'index'])->name('receita_conta.index')-> middleware('auth');
Route::post('financeiro/receita_conta/store', [App\Http\Controllers\Admin\Receita_contaController::class, 'storeReceita_conta'])->name('receita_conta.store')-> middleware('auth');


Route::get('financeiro/despesa_conta/index', [App\Http\Controllers\Admin\Despesa_contaController::class, 'index'])->name('despesa_conta.index')-> middleware('auth');
Route::post('financeiro/despesa_conta/store', [App\Http\Controllers\Admin\Despesa_contaController::class, 'storeDespesa_conta'])->name('despesa_conta.store')-> middleware('auth');

Route::get('financeiro/fluxoDeCaixa', [App\Http\Controllers\Admin\Despesa_contaController::class, 'fluxoDeCaixa'])->name('financeiro.fluxoDeCaixa')-> middleware('auth');

Route::get('financeiro/fluxoDeCaixa_futuro', [App\Http\Controllers\Admin\DespesaController::class, 'fluxoDeCaixa_futuro'])->name('financeiro.fluxoDeCaixa_futuro')-> middleware('auth');



/*
Route::get('/', [App\Http\Controllers\Site\SiteController::class, 'index'])->name('home');

*/

Auth::routes();


Route::get('/', function() {
    return view('site.home.index');
});


Route::get('/home', function() {
    return view('admin.home.index');
})->name('home')->middleware('auth');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.admin');
Route::get('/site/galeria/galeria', [App\Http\Controllers\HomeController::class, 'galeria'])->name('galeria');


// CRUD origem

Route::get('/origems/create', [App\Http\Controllers\Admin\OrigemsController::class,'create'])->name('origems.create');
Route::post('/origems/store', [App\Http\Controllers\Admin\OrigemsController::class,'storeOrigem'])->name('origems.store');
Route::get('/origems', [App\Http\Controllers\Admin\OrigemsController::class,'index'])->name('origems.index')-> middleware('auth');
Route::get('origems/{origem}', [App\Http\Controllers\Admin\OrigemsController::class,'show'])->name('origems.show');
Route::get('origems/{origem}/edit', [App\Http\Controllers\Admin\OrigemsController::class,'edit'])->name('origems.edit');
Route::patch('origems/{origem}', [App\Http\Controllers\Admin\OrigemsController::class,'update'])->name('origems.update');
Route::delete('/origems/{origem}', [App\Http\Controllers\Admin\OrigemsController::class,'destroy'])->name('origems.destroy');