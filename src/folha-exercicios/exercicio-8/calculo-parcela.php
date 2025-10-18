<?php

function validaParametros() {
    try {
        if(
            !is_numeric($_POST['valor-moto']) ||
            !is_numeric($_POST['qtd-parcela'])
        ) {
            throw new Error('Os valores precisam ser numéricos válidos!');
        }
    } catch (\Throwable $th) {
        echo $th->getMessage();
        return false;
    }
    return true;
}

function calculaParcela() {

    $valorMoto  = $_POST['valor-moto'];
    $qtdParcela = $_POST['qtd-parcela'];
    $taxa       = 1.5;
    $acrescimoTaxaPorPrazo = [
        24 => 0,
        36 => 1,
        48 => 2,
        60 => 3,
    ];

    //Como a quantidade de parcelas são múltiplos de 12, dividimos, pegamos o resultado e reduz
    $taxa += $acrescimoTaxaPorPrazo[$qtdParcela] * .5;

    $montante = $valorMoto * (1 + ($taxa / 100) * $qtdParcela );

    return $montante / $qtdParcela;
}

function escreveValorParcelas() {
    if(!validaParametros()) return;

    $parcela = calculaParcela();

    echo "<h1>O valor de cada parcela será R$" . number_format($parcela, 2, ',', '.') . "</h1>";
}

escreveValorParcelas();