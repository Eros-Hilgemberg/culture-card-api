<?php

namespace App\Helpers;

class Helper
{
    public function convertImage(String $caminho)
    {
        $imageConvertida = "data:image/png;base64," . base64_encode(file_get_contents(public_path("\assets\images/\/" . $caminho)));
        return $imageConvertida;
    }
}
