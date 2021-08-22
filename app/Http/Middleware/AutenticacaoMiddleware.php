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
        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return $next($request); //o middleware deixa passar caso haja uma sessão válida
        } else {
            return redirect()->route('site.login', ['erro' => 2]); //retorna para o get do login o erro 2
        }
    }
}
