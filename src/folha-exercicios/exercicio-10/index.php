<?php

$pastas = array(
    "bsn" => array(
        "3a Fase" => array("desenvWeb","bancoDados 1", "engSoft 1"),
        "4a Fase" => array("Intro Web","bancoDados 2", "engSoft 2")
    )
);

function listPastas($pastas, $separador = '-') {
    foreach($pastas as $pasta => $subPastas) {
        if( is_array($subPastas) ) {
            echo "$separador $pasta <br>";
            listPastas($subPastas, $separador . '-');
        } else {
            echo "$separador $subPastas <br>";
        }
    }
}


listPastas($pastas);