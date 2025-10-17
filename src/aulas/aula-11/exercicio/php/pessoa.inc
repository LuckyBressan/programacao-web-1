<?php

define(
    'MAP_DADOS_PESSOA', 
    [
        'PESNOME' => 'Nome',
        'PESSOBRENOME'  => 'Sobrenome',
        'PESEMAIL' => 'Email',
        'PESPASSWORD' => 'Senha',
        'PESCIDADE' => 'Cidade',
        'PESESTADO' => 'Estado'
    ]
);

function criaTabelaPessoa($dbconnect) {
    //Cria a tabela se não existe
    $result = pg_query(
        $dbconnect, 
        '
            CREATE TABLE IF NOT EXISTS TBPESSOA (
                PESCODIGO SERIAL NOT NULL PRIMARY KEY,
                PESNOME VARCHAR(150) NOT NULL,
                PESSOBRENOME VARCHAR(150),
                PESEMAIL VARCHAR(150),
                PESPASSWORD TEXT,
                PESCIDADE VARCHAR(100),
                PESESTADO VARCHAR(2)
            );
        '
    );

    if($result) {
        echo 'Criou!';
        
    } else {
        echo 'Erro ao criar tabela!';
    }

    echo '<br>';
}

function montaTabelaListagemPessoa($resultQuery) {
    echo '<table border="1">';
        echo '<thead>';
            echo '<tr>';
                foreach(MAP_DADOS_PESSOA as $key => $dado) {
                    echo '<th>'. $dado . '</th>';
                }
            echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
            while($row = pg_fetch_assoc($resultQuery)) {
                echo '<tr>';
                foreach(MAP_DADOS_PESSOA as $key => $dado) {
                    echo '<td>' . $row[strtolower($key)] . '</td>';
                }
                echo '</tr>';
            }
        echo '</tbody>';
    echo '</table>';

}

function listaPessoa($dbconnect) {
    $result = pg_query('SELECT * FROM TBPESSOA');

    if($result) {
        if( pg_num_rows($result) ) {
            montaTabelaListagemPessoa($result);
        } else {
            echo 'Nada encontrado!';
        }
        
    } else {
        echo 'Erro ao consultar!';
    }
    echo '<br>';
}

function inserePessoa($dbconnect) {
    if( !isset($_POST['nome']) ) {
        throw new Error('Informação obrigatório "nome" não informada!');
    }

    $dados = [
        'PESNOME' => isset($_POST['nome']) ? $_POST['nome'] : '',
        'PESSOBRENOME' => isset($_POST['sobrenome']) ?  $_POST['sobrenome'] : '',
        'PESEMAIL' => isset($_POST['email']) ?  $_POST['email'] : '',
        'PESPASSWORD' => isset($_POST['senha']) ?  $_POST['senha'] : '',
        'PESCIDADE' => isset($_POST['cidade']) ? $_POST['cidade'] : '',
        'PESESTADO' => isset($_POST['uf']) ? $_POST['uf'] : ''
    ];

    $result = pg_query_params(
        $dbconnect,
        'INSERT INTO TBPESSOA ('.implode(',', array_keys($dados)).') VALUES ($1, $2, $3, $4, $5, $6)',
        array_values($dados)
    );

    if( $result ) {
        echo 'Dados inseridos com sucesso!';
    } else {
        echo 'Erro ao inserir os dados!';
    }
    echo '<br>';
}