<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){ //GET
        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
        
    }

    public function salvar(Request $request){ //POST
        //validando
        $request -> validate(
            [   //quando o laravel não valida os dados, ele volta para o request anterior, nesse caso, o GET
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required'
            ],
            [        //personalizando as mensagens de retorno
            'nome.min:3' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max:40' => 'O campo nome deve ter no máximo 40 caracteres',
            'email.email' => 'O e-mail precisa ser válido',
            'email.unique' => 'O campo e-mail já existe',

            //'required' => 'O campo deve ser preenchido' //muda todas as mensagens do required para uma mensagem genérica de campo vazio
            'required' => 'O campo :attribute deve ser preenchido' //muda todas as mensagens do required para uma mensagem de campo vazio com o próprio nome do campo
            ]
    );
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');
        
        /* outra forma de salvar
        $contato = new SiteContato();
        $contato->create($request->all()); 
        */
    }
}
