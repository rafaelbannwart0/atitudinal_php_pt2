<?php
function alterarPagamento(array $array_associativa)
{
    $data_pagamento = DateTime::createFromFormat('d/m/Y', $array_associativa['data_pagamento']);
    $limite = DateTime::createFromFormat('d/m/Y', '02/02/2024');

    if ($data_pagamento < $limite) {
        $array_associativa['pago'] = true;
    } else {
        $array_associativa['pago'] = false;
    }

    return $array_associativa;
}

$array_associativa = [
    "produto" => "Camisa DnD - Tamanho M",
    "data_pagamento" => "01/02/2024",
    "pago" => false
];

$array_com_alteracoes = alterarPagamento($array_associativa);

print_r($array_com_alteracoes);

?>

2- <?php

function calcularMediaNotas(array $array_associativa)
{
    $notas = $array_associativa['notas'];
    $media = array_sum($notas) / count($notas);
    return $media;
}

$array_associativa = [
    "nome" => "maicon",
    "notas" => [
        "prova1" => 7,
        "prova2" => 5,
        "prova3" => 8,
        "prova4" => 9
    ]
];

$media = calcularMediaNotas($array_associativa);

echo "Média das notas de {$array_associativa['nome']}: $media\n";

?>

3- <?php

function mostrarNomeIdadeAlunos(array $array_de_arrays)
{
    foreach ($array_de_arrays as $aluno) {
        echo "Nome: " . $aluno['nome'] . ", Idade: " . $aluno['idade'] . "\n";
    }
}

$array_de_arrays = [
    [
        "nome" => "jesse",
        "idade" => 19
    ],
    [
        "nome" => "walter white",
        "idade" => 21
    ],
    [
        "nome" => "hank",
        "idade" => 33
    ]
];

mostrarNomeIdadeAlunos($array_de_arrays);

?>

4- <?php

function verificarCadastroUsuario(array $usuario, array $array_usuarios)
{
    if (strlen($usuario['nome']) <= 3) {
        echo "Erro: O nome do usuário deve ter pelo menos 3 caracteres.\n";
        return $array_usuarios;
    }

    if ($usuario['idade'] <= 18) {
        echo "Erro: O usuário deve ter mais que 18 anos.\n";
        return $array_usuarios;
    }

    if (strlen($usuario['email']) <= 10) {
        echo "Erro: O email deve ter pelo menos 10 caracteres.\n";
        return $array_usuarios;
    }

    if (strlen($usuario['senha']) <= 8) {
        echo "Erro: A senha deve ter pelo menos  8 caracteres.\n";
        return $array_usuarios;
    }

    foreach ($array_usuarios as $user) {
        if ($user['email'] === $usuario['email']) {
            echo "Erro: Email já cadastrado.\n";
            return $array_usuarios;
        }
    }

    $array_usuarios[] = $usuario;
    return $array_usuarios;
}

$array_usuarios = [
    [
        "nome" => "sasuke",
        "idade" => 21,
        "email" => "sasuke@gemail.com",
        "senha" => "naruutooooooooo"
    ],
    [
        "nome" => "arnaldo",
        "idade" => 19,
        "email" => "arnaldo.email@gemail.com",
        "senha" => "messimelhorqueronaldo"
    ]
];

$novo_usuario = [
    "nome" => "mike",
    "idade" => 25,
    "email" => "mikeross@gmail.com",
    "senha" => "eusouharveyspecter69"
];

$array_usuarios = verificarCadastroUsuario($novo_usuario, $array_usuarios);

print_r($array_usuarios);



?>
