<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //
    public function index(Request $request){
        $erro = '';
        
        if($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existem';
        }

        if($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página';
        }
        
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        //regras de validação
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        //mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é inválido',
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request->validate($regras, $feedback);
        
        //recuperando os parametros do formulario
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciando o model User
        $user = new User();
        $usuario = $user->where('email', $email) //checa no banco se o usuario existe
            ->where('password', $password)
            ->get()
            ->first(); //pega apenas a primeira informação encontrada

        if(isset($usuario->name)){ //se o usuario tem uma coluna nome setada no banco significa que ele existe
            //dd($usuario);
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            
            //dd($_SESSION);
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]); //manda um erro = 1 pro get
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
