<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Agent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Spatie\Browsershot\Browsershot;

class AgentController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $authService = app()->make('App\Services\AuthService');
        $converter = new Helper();

        $email = $request->header('email') ?? $request->input('email');
        $senha = $request->header('password') ?? $request->input('password');

        if (!$email || !$senha) {
            return response()->json(['message' => 'Credenciais não fornecidas'], 401);
        }

        $user = $authService->validationCredential($email, $senha);

        if (!$user) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $agent = $converter->getAgent($user->profile_id);

        return response()->json([
            'status' => true,
            'message' => "Login realizado com sucesso!",
            'user' => [
                'id' => $agent->id,
                'name' => $agent->nomeCompleto,
            ],
        ], 200);
    }
    public function show(Agent $agent, Request $request): JsonResponse
    {
        $authService = app()->make('App\Services\AuthService');
        $user = $authService->validationCredential($request->email, $request->password);

        if ($user->profile_id !== $agent->id) {
            return response()->json(['message' => 'Não autorizado'], 401);
        }
        $converter = new Helper();
        $agent = $converter->getAgent($agent->id);

        if (!$agent) {
            return response()->json(['message' => 'Agente não encontrado'], 404);
        }

        return response()->json([
            'status' => true,
            'agent' => [
                'id' => $agent->id,
                'nomeCompleto' => $agent->nomeCompleto,
                'agent_relation' => $agent->agent_relation,
            ],
        ], 200);
    }
    public function card(int $id)
    {
        $converter = new Helper();
        $agent = $converter->getAgent($id);

        if (!$agent) {
            return response()->json(['message' => 'Agente não encontrado'], 404);
        }

        if (!$agent->file || $agent->file->isEmpty()) {
            return response()->json(['message' => 'Dados incompletos!'], 404);
        }

        $url = env('API_URL');
        $menssage = $url . $id;

        $imagens = [
            "fotoPessoa" => $converter->convertImagePeople($agent->file->first()->path ?? "empty.jpg"),
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

        if (!$agent) {
            return response()->json(['message' => 'Agente não encontrado'], 404);
        }

        if (!$agent->file || $agent->file->isEmpty()) {
            return response()->json(['message' => 'Dados incompletos!'], 404);
        }

        $url = env('API_URL');

        $menssage = $url . $id;

        $imagens = [
            "fotoPessoa" => $converter->convertImagePeople($agent->file->first()->path ?? ""),
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
            $html_front = view('card.agentImageCard', ['agent' => $agent, 'imagens' => $imagens])->render();
            $html_back = view('card.cardAgentBack', ['agent' => $agent, 'imagens' => $imagens])->render();
        } else {
            $html_front = view('card.agentGroupImageCard', ['agent' => $agent, 'imagens' => $imagens])->render();
            $html_back = view('card.cardGroupBack', ['agent' => $agent, 'imagens' => $imagens])->render();
        }


        $base64_front = Browsershot::html($html_front)
            ->setOption('args', ['--no-sandbox']) // importante em servidores
            ->windowSize(600, 400)
            ->base64Screenshot();
        $base64_back = Browsershot::html($html_back)
            ->setOption('args', ['--no-sandbox']) // importante em servidores
            ->windowSize(600, 400)
            ->base64Screenshot();
        return response()->json([
            'image_base64_front' => 'data:image/png;base64,' . $base64_front,
            'image_base64_back' => 'data:image/png;base64,' . $base64_back
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
