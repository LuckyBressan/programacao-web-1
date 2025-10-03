<?php

$disciplinas = [null, null, 'Algoritmos II', 'Programação Web I', 'Banco de Dados II'];
$professores = [null, null, 'Fernando Bastos', 'Cleber Nardelli', 'Marco Butzke'];

for ($i=0; $i < 5; $i++) { 
    $professor  = $professores[$i];
    $disciplina = $disciplinas[$i];

    //não tenho aula na segunda e terça, porém como foi solicitado 5 iterações
    //Valido se possui os valores
    if( $professor && $disciplina ) {
        echo "Disciplina $disciplina, professor $professor <br>";
    }
}

