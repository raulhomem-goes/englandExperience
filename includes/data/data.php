<?php

$imagemPrincipal= [];
$pontosTuristicos = [];

$sql = $conexao->prepare("SELECT * FROM pontosTuristicos");
$sql->execute();
$i = 0;
foreach ($sql as $row) {
    $pontosTuristicos[$i] = [
        "id" => $row['id'],
        "nome" => $row['nome'],
        "descricao" => $row['descricao'],
        "nomeReal" => $row['nomeReal']
    ];
    $i++;
}

$sql2 = $conexao->prepare("SELECT * FROM imagemPrincipal");
$sql2->execute();
$j = 0;
foreach ($sql2 as $row) {
    $imagemPrincipal[$j] = [
        "id" => $row['id'],
        "nome" => $row['nome'],
    ];
    $j++;
}

