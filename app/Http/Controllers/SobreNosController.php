<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{
   /* public function __construct(){ //implementando middleware no construtor
        $this->middleware(LogAcessoMiddleware::class) //OU
        $this->middleware(log.acesso); //apelido setado no kernel
    }
    */

    public function sobrenos(){
        return view('site.sobrenos');
    }
}
