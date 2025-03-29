<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Grupo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index(int $id)
    {
        $grupo = Grupo::findOrFail($id);
        return $grupo;
    }
    public function card(int $id)
    {
        $converter = new Helper();
        $grupo = Grupo::findOrFail($id);
        $menssage = $converter->encodeMessage($id,$grupo->cnpj);
        $imagens = (object)[
            "fotoPessoa" => $converter->convertImage("PessoaFoto.jpg"),
            "logoConselho" => $converter->convertImage("conselho.png"),
            "logoImpact" => $converter->convertImage("impact.png"),
            "logos" => $converter->convertImage("logos.png"),
            "background" => $converter->convertImage("background.png"),
            "smallQrcode" => $converter->generateQrcode($menssage, [7, 19, 48],[248, 247, 240]),
            "qrcode" => $converter->generateQrcode($menssage, [248, 247, 240],[7, 19, 48])
        ];
        
        $pdf = Pdf::loadView('card.grupo', ['grupo' => $grupo, 'imagens' => $imagens]);
        return $pdf->stream('Card_Grupo.pdf');
    }
}
