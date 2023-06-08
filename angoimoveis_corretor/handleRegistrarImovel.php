<?php
session_start();



    if(isset($_POST["criarcasa"]))
    {
    //Upload of profile picture
        $nomeComprovativo;
        $target_dir = "data/";
        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
        $novoarquivo =$target_dir. md5(time()).$extensao;
    //$novoarquivo= $target_dir.md5( basename($_FILES["comprovativo"]["name"])).
    // '.'.strtolower(pathinfo($_FILES['comprovativo']['name'], PATHINFO_EXTENSION));

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($novoarquivo, PATHINFO_EXTENSION));
        //check if image file is a actual image or fake image
        $check = getimagesize($_FILES["arquivo"]["tmp_name"]);
        if($check !== false)
        {
            $uploadOk = 1;
        }
        else
        {
            echo "O tamanho da Imagem é muito grande.";
            $uploadOk = 0;
        }
        // limit repetition of files
        if(file_exists($novoarquivo)){
            echo "Desculpe, Este ficheiro ja existe";
            $uploadOk = 0;
        }
            //limit file size
        if ($_FILES["arquivo"]["size"] > 50000000)
        {
            echo "Desculpe, O ficheiro é mauito grande";
            $uploadOk = 0;
        }
        //Alow certain file formats
        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif')
        {
            echo "Desculpe, Apenas suportamos formatos JPG, JPEG, PNG e GIF.";
            $uploadOk =0;
        }
        // Check if $uploadOk is set to 0 by an error
        if($uploadOk == 0)
        {
            echo "Desculpe, ocorreu um erro e a sua imagem não foi carregada.";
        }
        else
        {
            if(move_uploaded_file($_FILES["arquivo"]["tmp_name"], $novoarquivo))
            {

                copy($novoarquivo, '../angoimoveis_cliente/'.$novoarquivo);
                copy($novoarquivo, '../angoimoveis_admin/'.$novoarquivo);
                $nomeComprovativo = basename( $_FILES["arquivo"]["name"]);
                
                //FUNCOES QUE CONVERSAM COM A BD
                echo $novoarquivo;
                function conecta()
                {
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=aluguer_casas;charset-utf8', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
                }

                function inserir($comando, $parametros = array())
                {
                $comandoSql =  conecta()->prepare($comando);
                $comandoSql->execute($parametros);
                }

                function pesquisar($comando, $parametros = array())
                {
                $comandoSql = null;
                $respostaSql = null;
                $respostaSql = conecta()->prepare($comando);
                $respostaSql->execute($parametros);
                $resultado = null;
                $resultado = $respostaSql->fetchAll();
                return $resultado;
                }
                function chamarProcedimento($sql){
                    $stmt = conecta()->prepare($sql);
                    //$stmt->bindParam(1, PDO::PARAM_STR, 4000);
                    $stmt->execute();
                }

                //Dados que vem do formulario em ResistrarImovel.php

                $topologia = $_POST['topologia'];
                $quartos = $_POST['quartos'];
                $cozinhas = $_POST['cozinhas'];
                $suites = $_POST['suites'];
                $salas = $_POST['salas'];
                $wcs = $_POST['wcs'];
                $estado = $_POST['estado'];
                $descricao = $_POST['descricao'];
                $provincia = $_POST['provincia'];
                $municipio = $_POST['municipio'];
                $rua = $_POST['rua'];
                $preco =(double) $_POST['preco'];

                
                $proprietario = $_SESSION['id_corrector'];
                echo $preco;
                chamarProcedimento('CALL criarimovel('.$proprietario.','.$topologia.','.$quartos.','.$cozinhas.','.$suites.','.$salas.
                ','.$wcs.','.$estado.',"'.$descricao.'","'.$provincia.'","'.$municipio.'","'.$rua.'",'.$preco.',"'.$novoarquivo.'" )');
                $_SESSION['action']=12;
                header('Location: index.php');


            }
            else
            {
                echo "Desculpe, Ocorreu um problema ao carregar a sua imagem.";
            }
        }
}