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

                case 'Aluno':
                    if (!$request->is('aluno/*')) { // Evita redirecionar para a própria rota
                        return redirect('/aluno/dashboard');
                    }
                    break;

                case 'Responsável':
                    if (!$request->is('responsavel/*')) { // Evita redirecionar para a própria rota
                        return redirect('/responsavel/dashboard');
                    }
                    break;

                case 'Diretor':
                    if (!$request->is('diretor/*')) { // Evita redirecionar para a própria rota
                        return redirect('/diretor/dashboard');
                    }
                    break;

                case 'Secretaria':
                    if (!$request->is('secretaria/*')) { // Evita redirecionar para a própria rota
                        return redirect('/secretaria/dashboard');
                    }
                    break;

                default:
                    return redirect('/login'); // Redireciona para login se o perfil for inválido
            }
        }

        return $next($request); // Continua a requisição
    }
}
