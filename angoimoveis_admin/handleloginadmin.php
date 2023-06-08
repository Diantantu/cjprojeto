<?php
session_start();

$dadosUsuario = null;
if(isset($_POST['adminlogin'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    function conectar()
    {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=aluguer_casas;charset-utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
    }

    function inserir($comando, $parametros = array())
    {
    $comandoSql =  conectar()->prepare($comando);
    $comandoSql->execute($parametros);
    }

    function chamarProcedimento($sql){
        $stmt = conectar()->prepare($sql);
        //$stmt->bindParam(1, PDO::PARAM_STR, 4000);
        $stmt->execute();
    }

    $sql = "SELECT * FROM `admin` where email = '".$email."'";
    $para = array(':email'=>$email);
    
    // where `email` = ":email"

    $A = null;
    $A = conectar()->prepare($sql);
    $A->execute();
    $resultadoPesquisa = $A->fetchAll();
 

    var_dump($resultadoPesquisa);
    if ( count($resultadoPesquisa) == 1){
        $dadosUsuario = $resultadoPesquisa[0];

        if(strcmp($dadosUsuario['senha'],$senha) == 0){
            $_SESSION['nome_admin'] = $dadosUsuario['nome'];
            $_SESSION['sobrenome_admin'] = $dadosUsuario['sobrenome'];
            $_SESSION['email_admin'] = $dadosUsuario['email'];
            $_SESSION['id_admin'] = $dadosUsuario['idadmin'];
            $_SESSION['telemovel_admin'] = $dadosUsuario['telefone'];
            $_SESSION['aniversario_admin'] = $dadosUsuario['criadoem'];
            $_SESSION['permissoes_admin'] = $dadosUsuario['permissoes'];
            $_SESSION['imagemperfil_admin'] = $dadosUsuario['imagemperfil'];

            header('Location: index.php');

        }
        else
        {
                //password errada;
                $_SESSION['action'] = 14;
                header('Location: loginadmin.php');

        }

    }
    else
    {
        //este email nao existe;
        $_SESSION['action'] = 15;
        header('Location: loginadmin.php');
    }

}


