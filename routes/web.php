<?php

use Illuminate\Support\Facades\Route;


Route::get('site/profile/profile', [App\Http\Controllers\Admin\UserController::class, 'profile'])->name('profile')-> middleware('auth');
Route::post('site/profile/profile', [App\Http\Controllers\Admin\UserController::class, 'profileUpdate'])->name('profile.update')-> middleware('auth');
Route::get('admin/home/index', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.home.index')-> middleware('auth');

Route::get('financeiro/receita/index', [App\Http\Controllers\Admin\ReceitaController::class, 'index'])->name('receita.index')-> middleware('auth');
Route::post('financeiro/receita/store', [App\Http\Controllers\Admin\ReceitaController::class, 'storeReceita'])->name('receita.store')-> middleware('auth');
Route::get('financeiro/receita/{despesa}/edit', [App\Http\Controllers\Admin\ReceitaController::class,'edit'])->name('receita.edit')-> middleware('auth');
Route::get('financeiro/receita/{despesa}', [App\Http\Controllers\Admin\ReceitaController::class,'show'])->name('receita.show')-> middleware('auth');
Route::patch('financeiro/receita/{despesa}', [App\Http\Controllers\Admin\ReceitaController::class,'update'])->name('receita.update')-> middleware('auth');



Route::get('financeiro/despesa/index', [App\Http\Controllers\Admin\DespesaController::class, 'index'])->name('despesa.index')-> middleware('auth');
Route::post('financeiro/despesa/store', [App\Http\Controllers\Admin\DespesaController::class, 'storeDespesa'])->name('despesa.store')-> middleware('auth');
Route::get('financeiro/despesa/{despesa}/edit', [App\Http\Controllers\Admin\DespesaController::class,'edit'])->name('despesa.edit')-> middleware('auth');
Route::patch('financeiro/despesa/{despesa}', [App\Http\Controllers\Admin\DespesaController::class,'update'])->name('despesa.update')-> middleware('auth');
Route::get('financeiro/despesa/{despesa}', [App\Http\Controllers\Admin\DespesaController::class,'show'])->name('despesa.show')-> middleware('auth');
Route::delete('financeiro/despesa/{despesa}', [App\Http\Controllers\Admin\DespesaController::class,'destroy'])->name('despesa.destroy')-> middleware('auth');


Route::get('financeiro/investimento/index', [App\Http\Controllers\Admin\InvestimentoController::class, 'index'])->name('investimento.index')-> middleware('auth');
Route::post('financeiro/investimento/store', [App\Http\Controllers\Admin\InvestimentoController::class, 'storeInvestimento'])->name('investimento.store')-> middleware('auth');
Route::get('financeiro/investimento/{despesa}/edit', [App\Http\Controllers\Admin\InvestimentoController::class,'edit'])->name('investimento.edit')-> middleware('auth');
Route::get('financeiro/investimento/{despesa}', [App\Http\Controllers\Admin\InvestimentoController::class,'show'])->name('investimento.show')-> middleware('auth');
Route::patch('financeiro/investimento/{despesa}', [App\Http\Controllers\Admin\InvestimentoController::class,'update'])->name('investimento.update')-> middleware('auth');

Route::get('financeiro/fluxoDeCaixa', [App\Http\Controllers\Admin\DespesaController::class, 'fluxoDeCaixa'])->name('financeiro.fluxoDeCaixa')-> middleware('auth');


Route::post('admin/manutencao/pesquisa', [App\Http\Controllers\Admin\ManutencaoController::class, 'pesquisa'])->name('manutencao.pesquisa')-> middleware('auth');
Route::get('admin/manutencao/consulta', [App\Http\Controllers\Admin\ManutencaoController::class, 'consulta'])->name('manutencao.consulta')-> middleware('auth');
Route::get('admin/manutencao/index', [App\Http\Controllers\Admin\ManutencaoController::class, 'index'])->name('manutencao.index')-> middleware('auth');
Route::post('admin/manutencao/store', [App\Http\Controllers\Admin\ManutencaoController::class, 'storemanutencao'])->name('manutencao.store')-> middleware('auth');
Route::get('admin/manutencao/{despesa}/edit', [App\Http\Controllers\Admin\ManutencaoController::class,'edit'])->name('manutencao.edit')-> middleware('auth');

Route::post('admin/manutencao/{despesa}', [App\Http\Controllers\Admin\ManutencaoController::class,'show'])->name('manutencao.show')-> middleware('auth');
Route::patch('admin/manutencao/{despesa}', [App\Http\Controllers\Admin\ManutencaoController::class,'update'])->name('manutencao.update')-> middleware('auth');
Route::delete('admin/manutencao/{despesa}', [App\Http\Controllers\Admin\ManutencaoController::class,'deletar'])->name('manutencao.deletar')-> middleware('auth');



/*
Route::get('/', [App\Http\Controllers\Site\SiteController::class, 'index'])->name('home');

*/

Auth::routes();

Route::get('/', function() {
    return view('site.home.index');
});


// Route::get('/home', function() {
 //   return view('admin.home.index');
// })->name('home')->middleware('auth');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.admin');
Route::get('/site/galeria/galeria', [App\Http\Controllers\HomeController::class, 'galeria'])->name('galeria');

// site free


Route::namespace('Site')->group(function () {
    Route::get('/', 'HomeController')->name('site.home.index');

    Route::get('produtos', 'ProductController@index')->name('site.products.index');
    Route::get('produtos/{slug}', 'ProductController@show')->name('site.products.show');

    Route::get('categoria', 'CategoryController@index')->name('site.category.index');

    Route::get('empresa', 'EmpresaController@index')->name('site.empresa.index');

    Route::get('project','ProjectController@index')->name('site.project.index');
    Route::get('news','NewsController@index')->name('site.news.index');

    Route::get('blog', 'BlogController@index')->name('site.blog');

    Route::view('sobre', 'site.about.index')->name('site.about');

    Route::get('contato', 'ContactController@index')->name('site.contact');
    Route::post('contato', 'ContactController@form')->name('site.contact.form');
});

// CRUD origem

Route::get('/origems/create', [App\Http\Controllers\Admin\OrigemsController::class,'create'])->name('origems.create');
Route::post('/origems/store', [App\Http\Controllers\Admin\OrigemsController::class,'storeOrigem'])->name('origems.store');
Route::get('/origems', [App\Http\Controllers\Admin\OrigemsController::class,'index'])->name('origems.index')-> middleware('auth');
Route::get('origems/{origem}', [App\Http\Controllers\Admin\OrigemsController::class,'show'])->name('origems.show');
Route::get('origems/{origem}/edit', [App\Http\Controllers\Admin\OrigemsController::class,'edit'])->name('origems.edit');
Route::patch('origems/{origem}', [App\Http\Controllers\Admin\OrigemsController::class,'update'])->name('origems.update');
Route::delete('/origems/{origem}', [App\Http\Controllers\Admin\OrigemsController::class,'destroy'])->name('origems.destroy');