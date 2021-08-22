<?php

use App\Http\Middleware\LogAcessoMiddleware;
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
Route::get('/', 'PrincipalController@principal')->name('site.index'); 

/*Route::get('/sobre-nos', function () {
    return 'Sobre Nós';
});
*/
Route::get('/sobrenos', 'SobreNosController@sobrenos')->name('site.sobrenos');

/*Route::get('/contato', function () {
    return 'Contato';
});*/
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get(
    '/contato/{nome}/{categoria_id}', 
    function(
        string $nome = "Desconhecido - ", 
        int $categoria_id = 1 //1- 'Informação'
    ) {
    echo "Estamos aqui: $nome, $categoria_id";
})->where('nome', '[A-Za-z]+')->where('categoria_id','[0-9]+'); //impede que a categoria não seja um numero e o nome seja caracteres não numéricos

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::prefix('/app')->
       middleware('log.acesso', 'autenticacao') //colocando o middleware em todas as rotas do grupo
       ->group(function(){      //agrupando as rotas

    Route::get('/home', 'HomeController@index')->name('app.home');

    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    Route::get('/cliente', 'ClienteController@index')->name('app.cliente'); 

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');

    Route::get('/produto', 'ProdutoController@index')->name('app.produto');

});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');


Route::fallback(function (){    //quando não houver uma rota válida
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui para ir para a página inicial</a>';
});