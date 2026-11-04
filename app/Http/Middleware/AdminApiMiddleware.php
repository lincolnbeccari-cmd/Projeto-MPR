<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;
use App\Models\Usertoken;
use App\Models\Usuario;
use Carbon\Carbon;
use App\Models\AdminToken;
use App\Models\Usuariotoken;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('token') && $request->has('usuario_id')) {
            $token = Usuariotoken::Where('usuario_id', $request->usuario_id)
                ->where('token', $request->token)
                ->where('valido_ate', '>', Carbon::now())
                ->first();
            if ($token) {

                $admin = AdminToken::where('usuario_id', '=', $request->usuario_id)->first();
                if ($admin) {
                    return $next($request);
                } else {
                    return response()->json(['message' => 'Usuario não é admin', 'erro' => 's'], 200);
                }
            }
            return response()->json(['message' => 'Token invalido ou expirado', 'erro' => 's'], 200);
        } else {
            return response()->json(['message' => 'Token não fornecido', 'erro' => 's'], 200);
        }
    }
}
