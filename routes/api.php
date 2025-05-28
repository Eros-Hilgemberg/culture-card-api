<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ParticipanteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('/agent')->group(
    function () {
        Route::get('/{agent}', [AgentController::class, 'show'])->name('agent.index')->where('agent', '[0-9]+');
        Route::get('/card/{id}', [AgentController::class, 'card'])->name('agent.card')->where('id', '[0-9]+');
        Route::get('/generateImage/{id}', [AgentController::class, 'generateImage'])->name('agent.generateImage')->where('id', '[0-9]+');;
        Route::get('/qrcode/{id}/{cpf}', [AgentController::class, 'qrCode'])->name('agent.cardQrcode')->where('id', '[0-9]+');
    }
);
