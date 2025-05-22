<?php

use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ParticipanteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/participante')->group(
    function () {
        Route::get('/{participante}', [ParticipanteController::class, 'show'])->name('participante.index')->where('participante', '[0-9]+');
        Route::get('/card/{id}', [ParticipanteController::class, 'card'])->name('participante.card')->where('id', '[0-9]+');
        Route::get('/qrcode/{id}/{cpf}', [ParticipanteController::class, 'qrCode'])->name('participante.cardQrcode')->where('id', '[0-9]+');
    }
);

Route::prefix('/group')->group(function () {
    Route::get('/{id}', [GrupoController::class, 'index'])->name('grupo.index')->where('id', '[0-9]+');
    Route::get('/card/{id}', [GrupoController::class, 'card'])->name('grupo.card')->where('id', '[0-9]+');
});
