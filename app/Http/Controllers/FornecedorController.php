<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(){
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request){

        $msg = ''; //mensagem começa vazia mas terá conteúdo caso o cadastro seja realizado com sucesso
        
        if($request->input('_token') != ''){ //o token aparece na requisição por causa do GET, caso esteja vazio então podemos cadastrar
            //validação
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no máximo 40 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 40 caracteres',
                'email.email' => 'O campo email não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);
            
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all()); //inserindo dados na tabela

            $msg = 'Cadastro realizado com sucesso';
        } 
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
