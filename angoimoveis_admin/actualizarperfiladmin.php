<?php
session_start();
include('classes/DB.php');



if(isset($_POST['action'])){

    $nome= $_POST['nome'];
    $sobrenome= $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $id = $_SESSION['id_admin'];


    
    $sql=
    "UPDATE `admin` SET `nome`=?, `sobrenome` = ?, `email`=?, `telefone`=? WHERE idadmin = ".$id.";";

    DB::inserir($sql,[$nome, $sobrenome, $email, $telefone] );

    $_SESSION['nome_admin'] = $nome;
    $_SESSION['sobrenome_admin'] = $sobrenome;
    $_SESSION['email_admin'] = $email;
    $_SESSION['telemovel_admin'] = $telefone;
    $_SESSION['action'] = 13;
    header('Location: Perfil.php');


}