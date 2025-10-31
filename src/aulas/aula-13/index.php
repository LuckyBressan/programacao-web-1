<?php

include_once("model/Pessoa.php");

$pessoa1 = new Pessoa(sobrenome: 'Adriano');
$pessoa1->setDataNascimento(new DateTime('2005-11-01'));
echo $pessoa1->getNomeCompleto() . '<br>';
echo $pessoa1->getIdade();