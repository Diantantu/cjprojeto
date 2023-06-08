<?php


include('classes/DB.php');

session_start();

if(isset( $_FILES['comprovativo']['name']))
{
    $nomeComprovativo;
    $target_dir = "comprovativos/";
    $extensao = strtolower(substr($_FILES['comprovativo']['name'], -4));
    $novoarquivo = $target_dir.md5(time()).$extensao;


    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($novoarquivo, PATHINFO_EXTENSION));
    //check if image file is a actual image or fake image
    $check = getimagesize($_FILES["comprovativo"]["tmp_name"]);
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
    if ($_FILES["comprovativo"]["size"] > 50000000)
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
        if(move_uploaded_file($_FILES["comprovativo"]["tmp_name"], $novoarquivo))
            copy($novoarquivo, '../angoimoveis_cliente/'.$novoarquivo);

            


            $cliente = $_POST['cliente'];
            $corretor = $_POST['corretor'];
            $mensagem = $novoarquivo;

            echo 'mensagem:'.$mensagem.'<br/>cliente:'.$cliente.'<br/>corretor:'.$corretor;
            $sql_reg_msg = 'insert into conversa values(NULL, ?, NOW(), ?, ?, 0, 0, 0)';
            DB::inserir($sql_reg_msg, [$mensagem, $corretor, $cliente]);

    }
    
}