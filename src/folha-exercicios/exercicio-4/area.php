<?php

if(
    !isset($_POST['lado-retangulo']) ||
    !isset($_POST['base-retangulo'])
) {
    throw new Error("Ao menos um dos dados não foi informado");
}

function getValoresPost() {
    $lado = $_POST['lado-retangulo'];
    $base = $_POST['base-retangulo'];

    return [
        $lado,
        $base
    ];
}

function calculaArea() {
    $area = 0;

    [ $lado, $base ] = getValoresPost();

    $area = $lado * $base;

    return $area;
}

function getTagRetorno($area) {
    $tag = 'h3';

    if ( $area > 10 ) {
        $tag = 'h1';
    }

    return $tag;
}

function escreveAreaRetangulo() {

    [ $lado, $base ] = getValoresPost();

    $area = calculaArea();
    $tag = getTagRetorno($area);

    echo "<$tag>Á área do retângulo de lados $lado e $base metros é $area m²</$tag>";
}

escreveAreaRetangulo();