<?php
session_start();
include('classes/DB.php');



    if(isset($_POST["actualizarfoto"]))
    {
        var_dump($_);
    //Upload of profile picture
        $nomeComprovativo;
        $target_dir = "fotoperfil/";
        $extensao = strtolower(substr($_FILES['foto']['name'], -4));
        $novoarquivo =$target_dir. md5(time()).$extensao;
    //$novoarquivo= $target_dir.md5( basename($_FILES["comprovativo"]["name"])).
    // '.'.strtolower(pathinfo($_FILES['comprovativo']['name'], PATHINFO_EXTENSION));

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($novoarquivo, PATHINFO_EXTENSION));
        //check if image file is a actual image or fake image
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false)
        {
            $uploadOk = 1;
        }
        else
        {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // limit repetition of files
        if(file_exists($novoarquivo)){
            echo "Sorry, file already exists";
            $uploadOk = 0;
        }
            //limit file size
        if ($_FILES["arquivo"]["size"] > 50000000)
        {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        //Alow certain file formats
        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif')
        {
            echo "Sorry, ONly JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk =0;
        }
        // Check if $uploadOk is set to 0 by an error
        if($uploadOk == 0)
        {
            echo "Sorry, your file was not uploaded.";
        }
        else
        {
            if(move_uploaded_file($_FILES["foto"]["tmp_name"], $novoarquivo))
            {
                $sql='UPDATE corrector SET imagemperfil=? WHERE idcorrector=?';
                DB::inserir($sql, [$novoarquivo, $_SESSION['id_corrector']]);
                $_SESSION['action']=16;
                $_SESSION['imagemperfil_corrector'] = $novoarquivo;
                header('Location: Perfil.php');


            }
            else
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }
}