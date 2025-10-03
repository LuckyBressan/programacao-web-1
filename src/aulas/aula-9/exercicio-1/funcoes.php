<?php
function mediaNotas($notas) : float|int {
    $media = 0;
    foreach ($notas as $nota) {
        $media += $nota;
    }
    $media /= count($notas);
    return $media;
}

/**
 * Calcula a frequência do aluno
 */
function calculaFrequencia($faltas): float|int {
    $totalAulas  = count($faltas);
    $faltasAluno = 0;

    foreach ($faltas as $falta) {
        if($falta == 0) $faltasAluno++;
    }

    $frequencia = 100 - (100 * $faltasAluno / $totalAulas);

    return $frequencia;
}

/**
 * Formata a frequência para um formato de string porcentagem
 */
function formataFrequenciaPorcentagem(): string {
    $frequencia = calculaFrequencia();
    return "$frequencia%";
}

function validaAprovacaoPorNota($notas): string {
    $media = mediaNotas($notas);
    return $media > 7;
}

function validaAprovacaoPorFrequencia($faltas) {
    $frequencia = calculaFrequencia($faltas);
    return $frequencia > 70;
}

function statusAprovacao(bool $aprovado) {
    return $aprovado ? 'APROVADO' : 'REPROVADO';
}