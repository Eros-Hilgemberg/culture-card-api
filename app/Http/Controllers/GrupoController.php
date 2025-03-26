<?php

namespace App\Http\Controllers;

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
        $grupo = Grupo::findOrFail($id);
        $pdf = Pdf::loadView('card.grupo', ['grupo' => $grupo]);
        return $pdf->stream('Card_Grupo.pdf');
    }
}
