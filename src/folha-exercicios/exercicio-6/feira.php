<?php

const MAPA_INFOS_FRONT = [
    'dinheiro' => 'dinheiro',
    'item' => [
        'maca' => [
            'maca-valor-kg',
            'maca-kg',
        ],
        'melancia' => [
            'melancia-valor-kg',
            'melancia-kg',
        ],
        'laranja' => [
            'laranja-valor-kg',
            'laranja-kg',
        ],
        'repolho' => [
            'repolho-valor-kg',
            'repolho-kg',
        ],
        'cenoura' => [
            'cenoura-valor-kg',
            'cenoura-kg',
        ],
        'batatinha' => [
            'batatinha-valor-kg',
            'batatinha-kg',
        ],
    ],
];

/**
 * Calcula o valor do item a partir de um array de parâmetros
 * @param array{valor_kg:int,kg:int} $item
 * @return int
 */
function calculaValorItem($item) {
    if( $item['kg'] && $item['valor_kg'] ) {
        return $item['kg'] * $item['valor_kg'];
    }
    return 0;
}


function getTotaFeira() {
    $campos = MAPA_INFOS_FRONT['item'];

    $valor = 0;

    foreach ($campos as $campo) {
        $valor += calculaValorItem([
            'kg'       => $_POST[$campo[0]],
            'valor_kg' => $_POST[$campo[1]],
        ]);
    }

    return $valor;
}

function calculaCompra() {
    $dinheiro = $_POST['dinheiro'];

    $valor = getTotaFeira();

    return [
        'valor-compra' => $valor,
        'restante' => $dinheiro - $valor
    ];
}

function escreveResultadoCompra() {

    $dinheiro = $_POST['dinheiro'];
    $compra = calculaCompra();

    echo "<h1>O valor da compra foi " . $compra['valor-compra'] . "</h1>";

    if( $compra['restante'] < 0  ) {
        echo "<h2 style='color: red;'>O valor da compra ficou acima do disponível (R$ " . $dinheiro . ").</h2>";
    } else if( $compra['restante'] > 0 ) {
        echo "<h2 style='color: blue;'>O valor da compra ficou dentro do disponível, saldo restante: R$ " . $compra['restante'] . ".</h2>";
    } else {
        echo "<h2 style='color: green;'>O valor da compra ficou igual ao valor disponível, saldo de compra esgotado.</h2>";
    }
}

escreveResultadoCompra();