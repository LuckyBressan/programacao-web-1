<?php

function validaValoresPost() {

    $variaveis = ['valor-1', 'valor-2', 'valor-3'];
    
    foreach($variaveis as $variavel) {
        if( !isset($_POST[$variavel]) ) {
            throw new Error("A variável '$variavel' não foi informada");
        }
        
        if( !is_numeric($_POST[$variavel]) ) {
            throw new Error("A variável '$variavel' é inválida");    
        }
    }
}

function getValoresPost() {
    $valor1 = $_POST['valor-1'];
    $valor2 = $_POST['valor-2'];
    $valor3 = $_POST['valor-3'];

    return [
        $valor1,
        $valor2,
        $valor3
    ];
}

function somaValoresPost() {
    $soma = 0;
    
    [ $valor1, $valor2, $valor3 ] = getValoresPost();

    $soma = $valor1 + $valor2 + $valor3;

    return $soma;
}

function getCoresRetorno() {
    [ $valor1, $valor2, $valor3 ] = getValoresPost();

    $cor = '';

    if ( $valor1 > 10 ) {
        $cor = 'blue';
    } else if( $valor2 < $valor3 ) {
        $cor = 'green';
    } else if( 
        $valor3 < $valor1 && 
        $valor3 < $valor2 
    ) {
        $cor = 'red';
    }

    return $cor;
}

function escreveSomaValoresPost() {
    validaValoresPost();

    $cor = getCoresRetorno();
    $soma = somaValoresPost();

    echo "<h1 style='color: $cor;'>Resultado da soma é: $soma</h1>";
}    

escreveSomaValoresPost();