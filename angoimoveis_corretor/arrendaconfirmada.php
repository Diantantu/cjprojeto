<?php

include('classes/DB.php');
session_start();

if(isset($_GET['imovelarrenda'])){

    $emailcliente = $_GET['emailcliente'];
    $imovelarrenda = $_GET['imovelarrenda'];
    $meses = $_GET['meses'];
    $proprietario = $_GET['proprietario'];
    $sql = 'INSERT INTO aluguer values(NULL, ?, ?, CURRENT_DATE, ?,?);';
    $data = date("Y-m-d");
    $dataprazo =strtotime("+".((int)$meses)." Months");
    DB::inserir($sql, [ $imovelarrenda, $emailcliente, $proprietario, $meses ]);
    
    $sqlAlterar = 'UPDATE aluguer_casas.imovel SET disponibilidade = 1 WHERE (`id` = ?);';
    DB::inserir($sqlAlterar, [$imovelarrenda]);
    echo 'arrendaconfirmada';
    



}
