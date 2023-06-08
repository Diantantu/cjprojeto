<?php

include('classes/DB.php');

//====CADASTRO DE CORRETORES=====

if(isset($_POST['firstName'])){//Recebe dados do formulario e regista os dados do corretor na bd

    $nome = $_POST['firstName'];
    $telefone = $_POST['telefone'];
    $sobrenome = $_POST['lastName'];
    $email = $_POST['email'];
    $nascimento = $_POST['dataNascimento'];
    $provincia = $_POST['provincia'];
    $endereco = $_POST['endereco'];
   // $genero = $_POST['genero'];
    $pais = $_POST['pais'];

    DB::inserir(
'INSERT INTO corrector VALUES (null, :primeironome, :ultimonome, :nascimento, :telemovel, :email, :senha,  :provincia)',
               array(':primeironome' =>$nome, ':ultimonome'=>$sobrenome,  
               ':nascimento'=>$nascimento, ':telemovel'=>$telefone, ':email'=>$email,':senha'=>'corrector', 
               ':provincia'=>$provincia ) );

               header( 'Location: criarCorretor.php?cadastrado=200');

}

//=====LOGIN DE CORRETORES======