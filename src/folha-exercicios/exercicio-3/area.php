<?php

if( !isset($_POST['lado-quadrado']) ) {
    throw new Error("O lado não foi informado");
}

$lado = $_POST['lado-quadrado'];

$area = $lado * $lado;

echo "<h1>Á área do quadrado de lado $lado metros é $area m²</h1>";