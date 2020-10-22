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

Route::get('financeiro/fluxoDeCaixa', [App\Http\Controllers\Admin\DespesaController::class, 'fluxoDeCaixa'])->name('financeiro.fluxoDeCaixa')-> middleware('auth');

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
