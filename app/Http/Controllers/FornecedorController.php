<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(10); //apenas dois registros por página
        
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all() ]); //passando os dados pra view
    }

    public function adicionar(Request $request){

        $msg = ''; //mensagem começa vazia mas terá conteúdo caso o cadastro seja realizado com sucesso
        
        //inserção
        if($request->input('_token') != '' && $request->input('id') == ''){ //o token aparece na requisição por causa do GET, caso não esteja vazio então podemos cadastrar, o ID estando vazio significa que é uma adição de dados
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
            //edição
            if($request->input('_token') != '' && $request->input('id') != '') { //caso haja um id inserido significa que uma edição será feita
                $fornecedor = Fornecedor::find($request->input('id'));
                $update = $fornecedor->update($request->all());

                if($update) {
                    $msg = 'Update realizado com sucesso';
                } else {
                    $msg = 'Update não realizado';
                }

                return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]); //redireciona junto com a mensagem
            }
        
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = ''){
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]); //manda os dados a serem editados para a view adicionar
    }

    public function excluir($id) {
        Fornecedor::find($id)->delete(); //softdelete
     // Fornecedor::find($id)->forceDelete(); deleta o registro completamente
        return redirect()->route('app.fornecedor');
    }
}
