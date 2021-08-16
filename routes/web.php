<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return 'Olá, seja bem vindo ao curso';
});
*/
Route::get('/', 'PrincipalController@principal')->name('site.index'); //dando nome as rotas

/*Route::get('/sobre-nos', function () {
    return 'Sobre Nós';
});
*/
Route::get('/sobrenos', 'SobreNosController@sobrenos')->name('site.sobrenos');

/*Route::get('/contato', function () {
    return 'Contato';
});*/
Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::get(
    '/contato/{nome}/{categoria_id}', 
    function(
        string $nome = "Desconhecido - ", 
        int $categoria_id = 1 //1- 'Informação'
    ) {
    echo "Estamos aqui: $nome, $categoria_id";
})->where('nome', '[A-Za-z]+')->where('categoria_id','[0-9]+'); //impede que a categoria não seja um numero e o nome seja caracteres não numéricos

Route::get('/login', function(){ return 'Login'; })->name('site.login');



Route::prefix('/app')->group(function(){      //agrupando as rotas

    Route::get('/clientes', function(){
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', function(){
        return 'Fornecedores';
    })->name('app.fornecedores');

    Route::get('/produtos', function(){
        return 'Produtos';
    })->name('app.produtos');

});

Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');


Route::get('/rota2', function(){
    return redirect()->route('site.rota1'); //redirecionando da rota 2 para a rota 1
})->name('site.rota2');


//Route::redirect('/rota2', 'rota1'); //redirecionando da rota2 para a rota1

Route::fallback(function (){    //quando não houver uma rota válida
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui para ir para a página inicial</a>';
});