<?php

require_once('Jogador.php');
require_once('Time.php');


$time = new Time('Teste', 2012);

$time->adicionaJogador('Geraldo', 'Meia', '2005-01-11');
$time->adicionaJogador('Lamal', 'Pivô', '2005-01-11');

var_dump($time->getJogadores());

