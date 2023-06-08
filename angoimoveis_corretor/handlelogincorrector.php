<?php
session_start();

$dadosUsuario = null;
if(isset($_POST['logincorrector'])){

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

    $sql = "SELECT * FROM `corrector` where email = '".$email."'";
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
            $_SESSION['nome_corrector'] = $dadosUsuario['primeironome'];
            $_SESSION['sobrenome_corrector'] = $dadosUsuario['ultimonome'];
            $_SESSION['email_corrector'] = $dadosUsuario['email'];
            $_SESSION['id_corrector'] = $dadosUsuario['idcorrector'];
            $_SESSION['telemovel_corrector'] = $dadosUsuario['telemovel'];
            $_SESSION['aniversario_corrector'] = $dadosUsuario['nascimento'];
            $_SESSION['pais_corrector'] = $dadosUsuario['pais'];
            $_SESSION['sexo_corrector'] = $dadosUsuario['sexo'];
            $_SESSION['endereco_corrector'] = $dadosUsuario['endereço'];
            $_SESSION['provincia_corrector'] = $dadosUsuario['provincia'];
            $_SESSION['imagemperfil_corrector'] = $dadosUsuario['imagemperfil'];

            





            header('Location: index.php');
        }
        else
        {
            //password errada;
            $_SESSION['action'] = 14;
            header('Location: logincorrector.php');

        }

    }
    else
    {
        //este email nao existe;
        $_SESSION['action'] = 15;
        header('Location: logincorrector.php');
    }

}