<?php

namespace App\Helpers;

use App\Models\Agent;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Helper
{
    public function convertImage(String $caminho)
    {
        $imageConvertida = "data:image/png;base64," . base64_encode(file_get_contents(public_path("\assets\images/\/" . $caminho)));
        return $imageConvertida;
    }
    public function generateQrcode(String $mensagem, array $color, array $background)
    {
        $qrcodeInf = QrCode::color($color[0], $color[1], $color[2])->backgroundColor($background[0], $background[1], $background[2])->generate($mensagem);
        $qrcode = "data:image/svg+xml;base64," . base64_encode($qrcodeInf);
        return $qrcode;
    }
    public function encodeMessage(int $id, $numberdoc)
    {
        $mensagemConvertida = base64_encode($id . $numberdoc);
        return $mensagemConvertida;
    }

    public function getAgent(int $id)
    {
        $agent = Agent::with(['agent_meta', 'file', 'term'])->findOrFail($id);

        $meta_keys = ['nomeCompleto', 'cpf', 'rg', 'cnpj', 'pisPasep', 'dataDeNascimento', 'tempoAtuacao'];
        $meta_values = collect($agent->agent_meta)
            ->filter(fn($meta) => in_array($meta->key, $meta_keys))
            ->pluck('value', 'key')
            ->toArray();

        $meta_values['term'] = $agent->term ?? null;
        $meta_values['file'] = $agent->file ?? null;

        return (object)[
            'id' => $agent->id,
            'type' => $agent->type,
            'name' => $agent->name,
            'rg' => $meta_values['rg'] ?? null,
            'cpf' => $meta_values['cpf'] ?? null,
            'nomeCompleto' => $meta_values['nomeCompleto'] ?? null,
            'cnpj' => $meta_values['cnpj'] ?? null,
            'pisPasep' => $meta_values['pisPasep'] ?? null,
            'dataDeNascimento' => $meta_values['dataDeNascimento'] ?? null,
            'tempoAtuacao' => $meta_values['tempoAtuacao'] ?? null,
            'term' => $meta_values['term'],
            'file' => $meta_values['file'],
        ];
    }
}
