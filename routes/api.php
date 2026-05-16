<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Saúde Virtual (Agendamento UBS)
|--------------------------------------------------------------------------
*/

// 1. Rota de Status da API
Route::get('/status', function () {
    return response()->json([
        'status' => 'online',
        'mensagem' => 'API do Sistema de Saúde Virtual está operando corretamente.',
        'versao' => '1.0.0',
        'timestamp' => now()->toDateTimeString()
    ]);
});

// 2. Listagem de Unidades Básicas de Saúde (UBS)
Route::get('/unidades', function () {
    return response()->json([
        'total' => 3,
        'data' => [
            ['id' => 1, 'nome' => 'UBS Centro', 'endereco' => 'Rua Principal, 123', 'telefone' => '(11) 4002-8922'],
            ['id' => 2, 'nome' => 'UBS Vila Nova', 'endereco' => 'Av. das Flores, 456', 'telefone' => '(11) 4002-8923'],
            ['id' => 3, 'nome' => 'UBS Esperança', 'endereco' => 'Praça da Paz, 789', 'telefone' => '(11) 4002-8924'],
        ]
    ]);
});

// 3. Listagem de Especialidades Médicas
Route::get('/especialidades', function () {
    return response()->json([
        'data' => [
            ['id' => 1, 'slug' => 'clinico-geral', 'nome' => 'Clínico Geral', 'descricao' => 'Consultas de rotina e orientações gerais.'],
            ['id' => 2, 'slug' => 'pediatria', 'nome' => 'Pediatria', 'descricao' => 'Atendimento especializado para crianças e adolescentes.'],
            ['id' => 3, 'slug' => 'ginecologia', 'nome' => 'Ginecologia', 'descricao' => 'Saúde da mulher e acompanhamento pré-natal.'],
            ['id' => 4, 'slug' => 'odontologia', 'nome' => 'Odontologia', 'descricao' => 'Tratamentos dentários e saúde bucal.'],
        ]
    ]);
});

// 4. Horários Disponíveis para Agendamento
Route::get('/agendamentos/disponiveis', function () {
    return response()->json([
        'unidade_id' => 1,
        'data_consulta' => '2026-05-20',
        'vagas_restantes' => 3,
        'horarios' => [
            ['hora' => '08:00', 'disponivel' => true],
            ['hora' => '08:30', 'disponivel' => false],
            ['hora' => '09:00', 'disponivel' => true],
            ['hora' => '09:30', 'disponivel' => true],
        ]
    ]);
});
