<?php
session_start();
include('classes/DB.php');


if(!isset($_SESSION['nome_corrector'])){
    header('Location: ./logincorrector.php');
}

if(isset($_POST['actualizarperfilcorrector'])){

    $nome = $_POST['nome'];
    
    $sobrenome =  $_POST['sobrenome'];
    
    $aniversario =  $_POST['datanascimento'];
    $endereco =  $_POST['endereco'];
    $sexo =  $_POST['sexo'];
    $provincia =  $_POST['provincia'];
    $telemovel =  $_POST['telemovel'];
    $pais =  $_POST['pais'];
    $email =  $_POST['email'];
    $id = $_SESSION['id_corrector'] ;


    $sql=
    "UPDATE `corrector` SET `primeironome`=?, `ultimonome` = ?, `nascimento`=?,  `telemovel`=?, `email`=? WHERE idcorrector = ".$id.";";

    DB::inserir($sql,[$nome, $sobrenome, $aniversario, $telemovel, $email] );

    $_SESSION['nome_corrector'] = $nome;
    $_SESSION['sobrenome_corrector'] = $sobrenome;
    $_SESSION['email_corrector'] = $email;
    $_SESSION['telemovel_corrector'] = $telemovel;
    $_SESSION['aniversario_corrector'] = $aniversario;
    $_SESSION['pais_corrector'] = $pais;
    $_SESSION['sexo_corrector'] = $sexo;
    $_SESSION['endereco_corrector'] = $endereco;
    $_SESSION['provincia_corrector'] = $provincia;
    $_SESSION['action'] = 13;
    header('Location: Perfil.php');
}