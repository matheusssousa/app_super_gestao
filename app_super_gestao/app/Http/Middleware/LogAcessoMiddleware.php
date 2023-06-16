<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log'=>"$ip requisitou a $rota"]);
        
//         $resposta = $next($request);
        // $resposta->setStatusCode(201, 'O sattus da resposta foi modificado');
        return $next($request);
    }
}
