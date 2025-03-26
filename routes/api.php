<?php

use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ParticipanteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//Route::get('/', [ParticipanteController::class, 'index'])->name('participante.index');
Route::prefix('/participante')->group(
    function () {
        Route::get('/{id}', [ParticipanteController::class, 'index'])->name('participante.index')->where('id', '[0-9]+');
        Route::get('/card/{id}', [ParticipanteController::class, 'card'])->name('participante.card')->where('id', '[0-9]+');
        Route::get('/qrcode/{id}/{cpf}', [ParticipanteController::class, 'qrCode'])->name('participante.cardQrcode')->where('id', '[0-9]+');
    }
);

Route::prefix('/grupo')->group(function () {
    Route::get('/{id}', [GrupoController::class, 'index'])->name('grupo.index')->where('id', '[0-9]+');
    Route::get('/card/{id}', [GrupoController::class, 'card'])->name('grupo.card')->where('id', '[0-9]+');
});
