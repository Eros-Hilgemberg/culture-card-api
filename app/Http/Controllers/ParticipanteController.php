<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Participante;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $participante = Participante::findOrFail($id);
        $menssage = $converter->encodeMessage($id,$participante->documento->cpf);

        $imagens = (object)[
            "fotoPessoa" => $converter->convertImage("PessoaFoto.jpg"),
            "logoConselho" => $converter->convertImage("conselho.png"),
            "logoImpact" => $converter->convertImage("impact.png"),
            "logos" => $converter->convertImage("logos.png"),
            "background" => $converter->convertImage("background.png"),
            "smallQrcode" => $converter->generateQrcode($menssage, [85, 26, 37],[248, 247, 240]),
            "qrcode" => $converter->generateQrcode($menssage, [248, 247, 240],[85, 26, 37])
        ];
        $pdf = Pdf::loadView('card.participante', ['participante' => $participante, 'imagens' => $imagens]);
        return $pdf->stream('Card_Participante.pdf');
    }
    public function qrCode(int $id, string $cpf)
    {
        (string)$word = env('WORD');
        (string)$token = base64_encode($word . $id . $cpf);
        (string)$qrCode = base64_encode($id . $cpf);
        dd($token, $qrCode);
    }
}
