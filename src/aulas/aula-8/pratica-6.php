<?php

$dadosAluno = [
    ['Disciplina'     , 'Faltas', 'Média'],
    ['Matemática'     , 5       , 8.5    ],
    ['Português'      , 2       , 9      ],
    ['Geografia'      , 10      , 6      ],
    ['Educação Física', 2       , 8      ]
];

$head  = '';
$body  = '';
$linhas = '';

foreach($dadosAluno as $key => $dados) {
    $linhas = '';
    $linhas  .= "<tr>";
    foreach($dados as $dado) {
        $linhas .= "<td>$dado</td>";
    }
    $linhas  .= "</tr>";

    //primeira linha é de cabeçalho da tabela, então armazenamos em um local diferente
    $key == 0 
        ? $head .= $linhas
        : $body .= $linhas;
}

echo "
    <table border='1'>
        <thead>
            $head
        </thead>
        <tbody>
            $body
        </tbody>
    </table>
";