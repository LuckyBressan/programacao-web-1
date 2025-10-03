<?php

$salario1 = 1000;
$salario2 = 2000;

$salario2 = $salario1;

$salario2++;

$salario1 += $salario1 * (10/100);

echo "Valor Salário 1: $salario1 <br>";
echo "Valor Salário 2: $salario2 <br>";

if( $salario1 > $salario2 ) {
    echo "O valor da variável 1 é maior que o valor da variável 2";
} else if($salario1 < $salario2) {
    echo "O valor da variável 1 é menor que o valor da variável 2";
} else {
    echo "Os valores são iguais";
}

echo "<br>";

for ($i=1; $i <= 100; $i++) { 
    if ($i == 50) break;
    $salario1++;
}

if ( $salario1 < $salario2 ) {
    echo $salario1;
}