<?php
session_start();

if(isset($_SESSION['nome_admin'])){
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corrector</title>
    <link rel="stylesheet" href="css/logincorrector.css">

</head>
<body>

<div class="center">
    <h1>Autenticação</h1>
    <h3 style="text-align:center;color:grey">Administrador<h3>
    <form method="post" action="handleloginadmin.php">
        <div class="txt_field">
            <input type="email" name='email' required>
            <span></span>
            <label>Email</label>
        </div>
        <div class="txt_field">
            <input type="password" name='senha' required>
            <span></span>
            <label>Senha</label>
        </div>
        <input type="submit" name="adminlogin" value="Login">
        <div class="signup_link">
            Esqueceu a sua senha? <a href="#">Recuperar</a>
        </div>
    </form>
</div>
    

<script src="js/sweetalert.min.js">
    </script>

<script>
<?php
         if( $_SESSION['action'] == 14){
            echo 'swal("Senha invalida!", "Insira uma senha valida!", "error")';
            $_SESSION['action'] = 0;
         }
                
        if($_SESSION['action'] == 15){
            echo 'swal("Email invalido!", "Verifique se o seu email esta bem escrito!", "error")';
            $_SESSION['action'] = 0;
        }

        ?>

</script>
</body>
</html>