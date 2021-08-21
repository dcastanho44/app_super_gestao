<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //recebe a request e manda para o destino
        //dd($request); //vê o conteudo dos arrays e funções do request

        $ip = $request->server->get('REMOTE_ADDR'); //pega o IP
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]); //cria no banco Log Acessos na coluna log
        //return Response('Middleware agindo...'); //para o middleware aqui
        
        
        //return $next($request);                    //passa para o proximo
        $resposta = $next($request);
        $resposta->setStatusCode(201, 'O status da resposta e o texto de resposta foram modificados!');
        return $resposta;
    }
}
