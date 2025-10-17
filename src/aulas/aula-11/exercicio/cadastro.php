<?php

try {

    $connectionString = 'host=localhost port=5432 dbname=local user=postgres password=unidavi';

    $dbconnect = pg_connect($connectionString);

    if( $dbconnect ) {
        echo 'Database conectado!<br>';

        function criaTabela($dbconnect) {
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


        function listaPessoas($dbconnect) {
            $result = pg_query('SELECT * FROM TBPESSOA');
    
            if($result) {
                if( pg_num_rows($result) ) {
                    $dados = [
                        'PESNOME' => 'Nome',
                        'PESSOBRENOME'  => 'Sobrenome',
                        'PESEMAIL' => 'Email',
                        'PESPASSWORD' => 'Senha',
                        'PESCIDADE' => 'Cidade',
                        'PESESTADO' => 'Estado'
                    ];
                    while($row = pg_fetch_assoc($result)) {
                        foreach($dados as $key => $dado) {
                            echo $dado . ': ' . $row[strtolower($key)];
                            echo '<br>';
                        }
                        echo '<br>';
                    }
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

        $operacao = isset($_GET['operacao']) ? $_GET['operacao'] : '';

        switch ($operacao) {
            case 'CRIAR':
                criaTabela($dbconnect);
                break;
            case 'INSERIR':
                inserePessoa($dbconnect);
                break;
            case 'LISTAR':
            default:
                listaPessoas($dbconnect);
                break;
        }


    } else {
        echo 'Erro ao conectar no database!';
    }
} catch (\Throwable $th) {
    echo $th->getMessage();
}