<?php
include('classes/DB.php');

session_start();

if(isset($_GET['cliente'])){

    $cliente = $_GET['cliente'];
    $corretor = $_GET['corretor'];
    $mensagem = $_GET['mensagem'];

    echo 'mensagem:'.$mensagem.'<br/>cliente:'.$cliente.'<br/>corretor:'.$corretor;
    $sql_reg_msg = 'insert into conversa values(NULL, ?, NOW(), ?, ?, 0, 0, 0)';
    DB::inserir($sql_reg_msg, [$mensagem, $corretor, $cliente]);
}
