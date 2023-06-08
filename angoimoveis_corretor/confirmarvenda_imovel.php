<?php
include('classes/DB.php');

$imovel = null;
$cliente = null;
session_start();
if(!isset($_SESSION['nome_corrector'])){
    header('Location: ./logincorrector.php');
}
$nomecompleto =  $_SESSION['nome_corrector'].' '.$_SESSION['sobrenome_corrector'];
function conecta()
{
$pdo = new PDO('mysql:host=127.0.0.1;dbname=aluguer_casas;charset-utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $pdo;
}

if(isset($_COOKIE['imoveldetalhesnotificacao'])){
$imovel = $_COOKIE['imoveldetalhesnotificacao'];
$cliente = $_COOKIE['clientedetalhes'];
}

//Dados da casa 

$sql = 'SELECT * FROM detalhes_imovel WHERE id='.$imovel.'';
$respostaSql = conecta()->prepare($sql);
$respostaSql->execute();
$resultado = null;
$resultadoConsulta = $respostaSql->fetchAll();
// $dadosImovel = $resultadoConsulta[0];
$sql_dados_imovel = 'SELECT * FROM imovel WHERE id=?';
$sqlDados = DB::pesquisar($sql_dados_imovel, [$imovel]);



//Dados do cliente
$sql = 'SELECT * FROM usuario WHERE email= ?';
$respostaSql = conecta()->prepare($sql);
$respostaSql->execute([$cliente]);
$resultado = null;
$resultadoConsultacliente = $respostaSql->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Confirmação de Venda</title>

  <!-- Favicons -->
  <link href="#" rel="icon">
  <link href="#" rel="apple-touch-icon">


  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/venobox/venobox.css" rel="stylesheet">
  <link href="vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/mdi/css/materialdesignicons.min.css">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="css/style_user.css" rel="stylesheet">

</head>

<body>



        <a href="Notificação.php" id='botaovoltar'>
          <i class='mdi mdi-arrow-left'></i>
        </a>
  <main id="main">

    <!-- ======= Detalhes do imovel ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">
        <div class="row">

          <div class="col-lg-8">

            <?php
          if((int)$sqlDados[0]['disponibilidade'] == 5)
             echo '<h2 class="portfolio-title">Imovel indisponivel para venda</h2>';
                          
                             
                              
           if((int)$sqlDados[0]['disponibilidade'] == 1)
             echo '<h2 class="portfolio-title">Confirmação de venda</h2>';
                                
                          
          if((int)$sqlDados[0]['disponibilidade'] == 2)
            echo '<h2 class="portfolio-title">Confirmação para arrendar</h2>';
                                       
                              
                            //  if((int)$sqlDados[0]['disponibilidade'] !) {
                            //     echo '<h2 class="portfolio-title">Imovel indisponivel</h2>';
                            //   }
            ?>
            
            
            <div class="owl-carousel portfolio-details-carousel">
              <img src=<?php echo "".$resultadoConsulta[0]['imagem'];?> class="img-fluid" alt="">

            </div>
          </div>

          <div class="col-lg-4 portfolio-info">
            <h3>Informações do cliente</h3>
            <ul>
              <li><strong>Nome</strong>: <?php echo $resultadoConsultacliente[0]['nome'].' '.$resultadoConsultacliente[0]['sobrenome'];?></li>
              <li><strong>Telefone</strong>: <?php echo $resultadoConsultacliente[0]['telefone'];?></li>
              <li><strong>Email</strong>: <a href="#"><?php echo $resultadoConsultacliente[0]['email'];?></a></li>
              <!-- <li><strong>Date</strong>: 01 March, 2023</li> -->
              
            </ul>

            <div class="InfoTec">
              <div class="container">

                 <div class="box">
                      <div class="container">
                          <h3>Informações Técnicas</h3>

                          <div class="d-flex tamanho">
                              <i class="mdi mdi-seat-individual-suite"></i>
                              <p>Quartos:</p>
                              <p><?php echo $resultadoConsulta[0]['quartos'];?></p>
                          </div>

                          <div class="d-flex tamanho">
                              <i class="mdi mdi-shower-head"></i>
                              <p>Casa de bainho:</p>
                              <p><?php echo $resultadoConsulta[0]['wc'];?></p>
                          </div>

                          <div class="d-flex tamanho">
                              <i class="mdi mdi-chef-hat"></i>
                              <p>Cozinha:</p>
                              <p><?php echo $resultadoConsulta[0]['cozinhas'];?></p>
                          </div>

                          <div class="d-flex tamanho">
                              <i class="mdi mdi-sofa"></i>
                              <p>Sala:</p>
                              <p><?php echo $resultadoConsulta[0]['sala'];?></p>
                          </div>

                          <hr>

                          <div class="valorImovel">
                              <p>Valor:</p>
                              <p><?php echo $resultadoConsulta[0]['preco'];?>,00 Kz</p>
                          </div>
                                                    

                          <div class="d-flex">
                          <?php

                              // 1 = venda
                              // 2 = aluguer
                              if((int)$sqlDados[0]['disponibilidade'] == 5)
                                echo "<button class='btn btn-secondary' id='btn'>Imovel já foi vendido</button>";
                              
                              if((int)$sqlDados[0]['disponibilidade'] == 1)
                                echo "<button class='btn btn-info' onclick='confirmarvenda(event)' id='btn'>Confirmar e vender</button>";
                                
                              if((int)$sqlDados[0]['disponibilidade'] == 2)
                                echo "<button class='btn btn-info' onclick='confirmararrenda(event)' id='btn'>Confirmar e arrendar</button>";
                              // else{
                              //   echo "<button class='btn btn-info' id='btn'>Imovel indisponivel</button>";
                              // }
                                
                          ?>
                            
                            

                          </div>
                          
                          
                      </div>
                 </div>
             
              </div>
            </div>  
          </div>

          

        </div>

      </div>
    </section><!-- End Portfolio Details -->

  </main><!-- End #main -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>
  <script src="vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="vendor/counterup/counterup.min.js"></script>
  <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="vendor/venobox/venobox.min.js"></script>
  <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="vendor/typed.js/typed.min.js"></script>
  <script src="vendor/aos/aos.js"></script>
  <script src="js/sweetalert.min.js"></script>


  <!-- Template Main JS File -->
  <script src="js/main_user.js"></script>
  <script>
  // function mostrarInteresse(usuario, imovel, e){
//     e.preventDefault()
//     var xhttp;
//     xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
//       if (this.readyState == 4 && this.status == 200) {
        
//         if(this.responseText =='pedidoenviado'){
//           swal("Pedido enviado!", "O Corrector entrará em contacto consigo!", "success")
//       .then((value) => {
//         window.document.location='user.php'
//       });
//       }
//       if(this.responseText =='pedidoexistente'){
        
//         swal("Pedido já efectuado!", "O pedido já se encontra registado!", "warning");
        
//       }

//   }
// };
//     xhttp.open("GET", "mostrarinteresse.php?u="+usuario+"&i="+imovel, true);
//     xhttp.send();

// }


function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


function confirmarvenda( event){

  let imovel = getCookie('imoveldetalhesnotificacao')
  let emailcliente = getCookie('clientedetalhes')


  swal("Confirmação da venda", "Tem a certeza que pretende confirmar esta venda?<br/>Verificou se os valores foram depositados na sua conta?",{
  buttons: {
    cancel:{
    text: "Cancelar",
    value: null,
    visible: true,
    className: "",
    closeModal: true},
    confirm: {
    text: "Confirmar",
    value: true,
    visible: true,
    className: "",
    closeModal: true,
    },},
}) .then((value) => {
  if(value)
  {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        
      if(this.responseText == 'vendaconfirmada'){
        alert('Venda realizada com sucesso')
      }

  }
};
    xhttp.open("GET", "vendaconfirmada.php?emailcliente="+emailcliente+"&imovelvenda="+imovel, true);
    xhttp.send();
  }
      });
}




function confirmararrenda(event){

  
  let imovel = getCookie('imoveldetalhesnotificacao')
  let emailcliente = getCookie('clientedetalhes')

  var slider = document.createElement("input");
  var slider2 = document.createElement("input");
  var qtd = document.createElement('input');
  qtd.type='text';
  qtd.innerHTML='12'
  slider.type = "range";
  let proprietario = <?php echo $_SESSION['id_corrector'];?>
 
swal('Selecione quantos meses o cliente pagou',{
  content: {
    element: "input",
    attributes: {
      placeholder: "Meses pagos",
      type: "number",
      },
      },
    buttons: {
    cancel:{
    text: "Cancelar",
    value: null,
    visible: true,
    className: "",
    closeModal: true},
    confirm: {
    text: "Confirmar",
    value: true,
    visible: true,
    className: "",
                  closeModal: true,
    },},

}).then((value) => {
  if(value)
  {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        
      if(this.responseText == 'arrendaconfirmada'){
        swal('Imovel arrendado com sucesso!',{
          icon:"success",
          confirm: {
            text: "OK",
            value: true,
            visible: true,
            className: "",
            closeModal: true
          }
        }).then((value) => {
          window.location = "Notificação.php"

        });
        
      }

  }
}
    xhttp.open("GET", "arrendaconfirmada.php?emailcliente="+emailcliente+"&imovelarrenda="+imovel+"&meses="+value+"&proprietario="+proprietario, true);
    xhttp.send();
  }
      });

    


}



  </script>
<script src="js/sweetalert.min.js"></script>

</body>

</html>