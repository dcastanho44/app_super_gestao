<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
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
        //verifica se o usuário possui acesso à rota
       if(true){
           return $next($request);
       } else {
       return Response ('Acesso Negado! Rota exige autenticação!');
       }
    }
}