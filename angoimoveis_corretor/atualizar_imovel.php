<?php

include('classes/DB.php');

if(isset($_POST['descricao']))
{

$descricao = $_POST['descricao'];

$provincia = $_POST['provincia'];

$municipio = $_POST['municipio'];

$bairro = $_POST['bairro'];

$preco = $_POST['preco'];

$id = $_POST['id'];

$disponibilidade = $_POST['disponibilidade'];

$sql = "UPDATE aluguer_casas.imovel SET descricao=?, provincia=?, municipio=?, bairro=?, preco=?, municipio=?, disponibilidade=? WHERE (id = ?);";

DB::inserir($sql, [$descricao, $provincia, $municipio, $bairro, $preco, $municipio, $disponibilidade, $id ]);

header('Location: imovel.php');
}