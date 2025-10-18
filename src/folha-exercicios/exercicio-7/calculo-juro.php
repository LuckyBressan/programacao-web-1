<?php

function validaParametros() {
    try {
        if(
            !is_numeric($_POST['valor-carro']) ||
            !is_numeric($_POST['qtd-parcela']) ||
            !is_numeric($_POST['valor-parcela'])
        ) {
            throw new Error('Os valores precisam ser numéricos válidos!');
        }
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }

}

function calculaJuros() {

    $valorCarro   = $_POST['valor-carro'];
    $qtdParcela   = $_POST['qtd-parcela'];
    $valorParcela = $_POST['valor-parcela'];

    $valorTotal   = $qtdParcela * $valorParcela;

    return $valorTotal - $valorCarro;
}

function escreveValorJuros() {
    if(!validaParametros()) return;

    $juros = calculaJuros();

    echo "<h1>Em comparação ao valor do carro, o valor dos juros é de R$" . number_format($juros, 2, ',', '.') . "</h1>";
}

escreveValorJuros();