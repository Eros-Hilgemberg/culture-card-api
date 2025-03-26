<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
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
        $grupo = Grupo::findOrFail($id);
        return view('card.grupo', compact('grupo'));
    }
}
