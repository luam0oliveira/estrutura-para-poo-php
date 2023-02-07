<?php
// 1. Crie um vetor bidimensional (matriz), em que o índice da primeira dimensão é
// nome da pessoa concatenado com o código. A segunda dimensão é um vetor
// indexado pelo nome do atributo, contendo o valor do atributo em cada posição.

$data = [
    ["codigo" => "001", "nome" => "Joao", "endereco" => "Rua do João"],
    ["codigo" => "002", "nome" => "Ari", "endereco" => "Rua da Ari"],
];

$arrayOfUsers = [];

function studyCaseString(string $input)
{
    $formattedName = '';
    
    for($i = 0; $i < strlen($input); $i++)
    {
        if($i%2 == 0){
            $formattedName .= strtoupper($input[$i]);
        }else{
            $formattedName .= strtolower($input[$i]);
        }
    }

    return $formattedName;
}

foreach($data as $user)
{
    $key = $user['nome'] . $user['codigo'];
    $user['nome'] = studyCaseString($user['nome']);
    $arrayOfUsers[$key] = $user; 
}

ksort($arrayOfUsers, SORT_STRING);


echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Código</th>';
echo '<th>Nome</th>';
echo '<th>Endereço</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach($arrayOfUsers as $user)
{
    echo '<tr>';
    echo "<td>{$user['codigo']}</td>";
    echo "<td>{$user['nome']}</td>";
    echo "<td>{$user['endereco']}</td>";
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
