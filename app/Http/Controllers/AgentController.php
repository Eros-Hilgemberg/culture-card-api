<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function show(Agent $agent): JsonResponse
    {
        $agent->agent_meta;
        $agent->file;
        return response()->json([
            'status' => true,
            'participante' => $agent,
        ], 200);
    }
    
}
