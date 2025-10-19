<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
  /**
   * Valida as credenciais e autentica o usuário.
   *
   * @param string $email
   * @param string $password
   * @return User|null Retorna o usuário autenticado ou null se falhar
   */
  public function validationCredential(string $email, string $password)
  {
    $user = User::where('email', $email)->first();

    if (!$user) {
      return null; // usuário não encontrado
    }

    $passwordMeta = $user->user_meta()->where('key', 'localAuthenticationPassword')->first();

    if (!$passwordMeta || !Hash::check($password, $passwordMeta->value)) {
      return null; // password incorreta
    }

    return $user;
  }
}
