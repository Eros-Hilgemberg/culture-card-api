<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Participante;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ParticipanteController extends Controller
{
    public function show(int $id)
    {
        $participante = Participante::findOrFail($id);
        return $participante;
    }
    public function card(int $id)
    {
        $converter = new Helper();
        $imagens = (object)[
            "fotoPessoa" => $converter->convertImage("PessoaFoto.jpg"),
            "logoConselho" => $converter->convertImage("conselho.png"),
            "logoImpact" => $converter->convertImage("impact.png"),
            "logos" => $converter->convertImage("logos.png"),
            "background" => $converter->convertImage("background.png")
        ];
        $participante = Participante::findOrFail($id);
        $pdf = Pdf::loadView('card.participante', ['participante' => $participante, 'imagens' => $imagens]);
        return $pdf->stream('Card_Participante.pdf');
    }
    public function cardtese(int $id)
    {
        $participante = Participante::findOrFail($id);
        return view('card.participante')->with(compact('participante'));
    }
    public function qrCode(int $id, string $cpf)
    {
        (string)$word = env('WORD');
        (string)$token = base64_encode($word . $id . $cpf);
        (string)$qrCode = base64_encode($id . $cpf);
        dd($token, $qrCode);
    }
}
