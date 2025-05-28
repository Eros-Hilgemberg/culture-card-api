<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Agent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;

class AgentController extends Controller
{
    public function show(Agent $agent): JsonResponse
    {

        $converter = new Helper();
        $agent = $converter->getAgent($agent->id);
        return response()->json([
            'status' => true,
            'agent' => $agent,
        ], 200);
    }
    public function card(int $id)
    {
        $converter = new Helper();
        $agent = $converter->getAgent($id);

        $menssage = $converter->encodeMessage($id, $agent->cpf ?? $agent->cnpj);

        $imagens = [
            "fotoPessoa" => $converter->convertImage("PessoaFoto.jpg"),
            "logoConselho" => $converter->convertImage("conselho.png"),
            "logoImpact" => $converter->convertImage("impact.png"),
            "logos" => $converter->convertImage("logos.png"),
            "background" => $converter->convertImage("background.png"),
        ];

        if ($agent->type == 1) {
            $imagens["smallQrcode"] = $converter->generateQrcode($menssage, [85, 26, 37], [248, 247, 240]);
            $imagens["qrcode"] = $converter->generateQrcode($menssage, [248, 247, 240], [85, 26, 37]);
        } else {
            $imagens["smallQrcode"] = $converter->generateQrcode($menssage, [7, 19, 48], [248, 247, 240]);
            $imagens["qrcode"] = $converter->generateQrcode($menssage, [248, 247, 240], [7, 19, 48]);
        }

        $imagens = (object)$imagens;
        if ($agent->type === 1) {
            $pdf = Pdf::loadView('card.agent', ['agent' => $agent, 'imagens' => $imagens]);
        } else {
            $pdf = Pdf::loadView('card.agentGroup', ['agent' => $agent, 'imagens' => $imagens]);
        }
        return $pdf->stream('Card_Agent.pdf');
    }
    public function generateImage(int $id)
    {
        $converter = new Helper();
        $agent = $converter->getAgent($id);

        $menssage = $converter->encodeMessage($id, $agent->cpf ?? $agent->cnpj);

        $imagens = [
            "fotoPessoa" => $converter->convertImage("PessoaFoto.jpg"),
            "logoConselho" => $converter->convertImage("conselho.png"),
            "logoImpact" => $converter->convertImage("impact.png"),
            "logos" => $converter->convertImage("logos.png"),
            "background" => $converter->convertImage("background.png"),
        ];

        if ($agent->type == 1) {
            $imagens["smallQrcode"] = $converter->generateQrcode($menssage, [85, 26, 37], [248, 247, 240]);
            $imagens["qrcode"] = $converter->generateQrcode($menssage, [248, 247, 240], [85, 26, 37]);
        } else {
            $imagens["smallQrcode"] = $converter->generateQrcode($menssage, [7, 19, 48], [248, 247, 240]);
            $imagens["qrcode"] = $converter->generateQrcode($menssage, [248, 247, 240], [7, 19, 48]);
        }

        $imagens = (object)$imagens;
        $html = view('card.testimage', ['agent' => $agent, 'imagens' => $imagens])->render();

        $base64 = Browsershot::html($html)
            ->setOption('args', ['--no-sandbox']) // importante em servidores
            ->windowSize(600, 400)
            ->base64Screenshot();
        return response()->json([
            'image_base64' => 'data:image/png;base64,' . $base64
        ]);
    }
    public function qrCode(int $id, string $cpf)
    {
        (string)$word = env('WORD');
        (string)$token = base64_encode($word . $id . $cpf);
        (string)$qrCode = base64_encode($id . $cpf);
        dd($token, $qrCode);
    }
}
