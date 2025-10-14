<?php

if(
    !isset($_POST['altura-triangulo']) ||
    !isset($_POST['base-triangulo'])
) {
    throw new Error("Ao menos um dos dados não foi informado");
}

function getValoresPost() {
    $altura = $_POST['altura-triangulo'];
    $base = $_POST['base-triangulo'];

    return [
        $altura,
        $base
    ];
}

function calculaArea() {
    $area = 0;

    [ $altura, $base ] = getValoresPost();

    $area = ($altura * $base) / 2;

    return $area;
}

function escreveAreaTriangulo() {

    $area = calculaArea();

    echo "<h1>Á área do triângulo retângulo é $area m²</h1>";
}

escreveAreaTriangulo();