<?php

namespace App\Http\Middleware;

use App\Services\AuthService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCredentialsMiddleware
{
    protected $authService;

    // Injeta o AuthService automaticamente
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function handle(Request $request, Closure $next)
    {
        $email = $request->header('email') ?? $request->input('email');
        $senha = $request->header('password') ?? $request->input('password');

        if (!$email || !$senha) {
            return response()->json(['message' => 'Credenciais não fornecidas'], 401);
        }

        $user = $this->authService->validationCredential($email, $senha);

        if (!$user) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }
        return $next($request) ?? response()->json(['message' => 'Erro ao processar a requisição'], 500);
    }
}
