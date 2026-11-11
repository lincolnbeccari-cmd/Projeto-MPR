<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use App\Models\UsuarioToken;
use Carbon\Carbon;
use App\Models\Usuario;


class LogadoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Cookie::has('token') && Cookie::has('usuario_id')) {
            $usuario_id = Cookie::get('usuario_id');
            $token = Cookie::get('token');
            $token = json_decode($token);
            $usuario_id = json_decode($usuario_id);
            $token_usuario = UsuarioToken::where('usuario_id', $usuario_id)
                ->where('token', $token)
                ->where('valido_ate', '>', Carbon::now())
                ->first();
            if ($token_usuario) {
                $usuario = Usuario::find($usuario_id);
                $request->merge(['usuario' => $usuario]);
                return $next($request);
            } else {
                Cookie::forget('token');
                Cookie::forget('usuario_id');
                return redirect()->route('login');
            }
        } else {
            Cookie::forget('token');
            Cookie::forget('usuario_id');
            return redirect()->route('login');
        }
    }
}
