<?php

namespace App\Helpers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Helper
{
    public function convertImage(String $caminho)
    {
        $imageConvertida = "data:image/png;base64," . base64_encode(file_get_contents(public_path("\assets\images/\/" . $caminho)));
        return $imageConvertida;
    }
    public function generateQrcode(String $mensagem,array $color , array $background)
    {
        $qrcodeInf = QrCode::color($color[0],$color[1],$color[2])->backgroundColor($background[0],$background[1],$background[2])->generate($mensagem);
        $qrcode = "data:image/svg+xml;base64," . base64_encode($qrcodeInf);       
        return $qrcode;
    }
    public function encodeMessage(int $id, $numberdoc)
    {
        $mensagemConvertida = base64_encode($id . $numberdoc);
        return $mensagemConvertida;
    }
}
