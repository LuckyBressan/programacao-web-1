<?php

include_once('connection.inc');
include_once('pessoa.inc');

try {

    $dbconnect = connectDatabase();

    if( $dbconnect ) {
        $operacao = isset($_GET['operacao']) ? $_GET['operacao'] : '';

        switch (strtoupper($operacao)) {
            case 'CRIAR_TABELA':
                criaTabelaPessoa($dbconnect);
                break;
            case 'INSERIR':
                inserePessoa($dbconnect);
                break;
            case 'LISTAR':
            default:
                listaPessoa($dbconnect);
                break;
        }


    } else {
        echo 'Erro ao conectar no database!';
    }
} catch (\Throwable $th) {
    echo $th->getMessage();
}