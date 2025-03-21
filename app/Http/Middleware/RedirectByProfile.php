<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectByProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user) {
            return $next($request); // Se o usuário não está autenticado, deixa passar
        }

        $perfilAtual = $user->perfilAtual();

        if ($perfilAtual) {
            switch ($perfilAtual->name) {
                case 'Administrador':
                    if (!$request->is('admin/*')) { // Evita redirecionar para a própria rota
                        return redirect('/admin/dashboard');
                    }
                    break;

                case 'Vendedor':
                    if (!$request->is('vendedor/*')) { // Evita redirecionar para a própria rota
                        return redirect('/vendedor/dashboard');
                    }
                    break;

                case 'Afiliado':
                    if (!$request->is('afiliado/*')) { // Evita redirecionar para a própria rota
                        return redirect('/afiliado/dashboard');
                    }
                    break;

                case 'Cliente':
                    if (!$request->is('cliente/*')) { // Evita redirecionar para a própria rota
                        return redirect('/cliente/dashboard');
                    }
                    break;

                default:
                    return redirect('/login'); // Redireciona para login se o perfil for inválido
            }
        }

        return $next($request); // Continua a requisição
    }
}
