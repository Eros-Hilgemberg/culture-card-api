<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    public function index(int $id)
    {
        $participante = Participante::findOrFail($id);
        return $participante;
    }
    public function card(int $id)
    {
        $participante = Participante::findOrFail($id);
        return view('card.participante', compact('participante'));
    }
    public function qrCode(int $id, string $cpf)
    {
        (string)$word = env('WORD');
        (string)$token = base64_encode($word . $id . $cpf);
        (string)$qrCode = base64_encode($id . $cpf);
        dd($token, $qrCode);
    }
}
