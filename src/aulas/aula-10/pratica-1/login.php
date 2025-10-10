<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();


if(
    !isset($_COOKIE['usuario']) ||
    !isset($_COOKIE['inicio_sessao'])
) {
    echo 'Dados de sessão perdidos<br>';
}

$_SESSION['ultima_request'] = date('d/m/Y H:i:s');

if( !isset($_SESSION['usuario']) ) {
    if(
        !isset($_POST['usuario']) ||
        !isset($_POST['senha'])
    ) {
        throw Error('Necessário informar usuário e senha no login');
    }

    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['senha']   = $_POST['senha'];
    $_SESSION['inicio_sessao'] = date('d/m/Y H:i:s');

    setcookie('usuario', $_SESSION['usuario'], (time()+60*5), '/');
    setcookie('inicio_sessao', $_SESSION['inicio_sessao'], (time()+60*5), '/');

    echo 'Usuário cadastrado com sucesso';
}
else {

    $tempoSessao = strtotime($_SESSION['ultima_request']) - strtotime($_SESSION['inicio_sessao']);

    if( $tempoSessao > 1500 ) {
        session_destroy();
        echo 'Sessão expirada!<br>';
        die;
    } else {
        echo 'Usuário: ' . $_SESSION['usuario'] . '<br>';
        echo 'Senha: ' . $_SESSION['senha'] . '<br>';
        echo 'Data/hora do início da sessão: ' . $_SESSION['inicio_sessao'] . '<br>';
        echo 'Data/hora da última request: ' . $_SESSION['ultima_request'] . '<br>';
        echo 'Tempo de sessão: ' . $tempoSessao . ' segundos<br>';
    }

}

echo '<br><a href="./">Clique aqui para ir para o login</a>';