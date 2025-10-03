<?php

include_once('funcoes.php');

$notas = [ 9, 9.5, 10, 4, 4.0 ];

$faltas = [1, 1, 0, 1, 0];


echo "Aprovação por nota: " . statusAprovacao(
    validaAprovacaoPorNota($notas)
);
echo "<br>";
echo "Aprovação por frequência: " . statusAprovacao(
    validaAprovacaoPorFrequencia($faltas)
);