<?php

if( !isset($_POST['numero']) ) {
    throw new Error("O número não foi informado");
}

$numero = $_POST['numero'];

if( $numero % 2 == 0 ) {
    echo "<h1>Valor $numero é divisível por 2</h1>";
} else {
    echo "<h1>Valor $numero não é divisível por 2</h1>";
}

