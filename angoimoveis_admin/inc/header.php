<?php
session_start();
include('classes/DB.php');


if(isset($_SESSION['nome_admin'])){

}else{
 header('Location: loginadmin.php');

 
}



//ESTATISTICA////////////////////////
//SOMATORIOS


//$sql = 'CALL estatistica_admin(@vendidos, @corrector, @imoveis, @faturacao)';

$sql_qtd_imoveis = 'SELECT count(id) as imoveis FROM imovel ';
$sql_qtd_imoveis_vendidos = 'SELECT COUNT(idvendas) as vendidos from vendas';
$sql_qtd_correctores = 'SELECT COUNT(idcorrector) as correctores from corrector';
$sql_faturacao = 'SELECT SUM(imovel.preco) as faturacao from vendas inner join imovel on
 imovel.id=vendas.imovel ';

$qtd_imoveis = DB::pesquisar($sql_qtd_imoveis, []);
$qtd_imoveis_vendidos = DB::pesquisar($sql_qtd_imoveis_vendidos, []);
$qtd_correctores = DB::pesquisar($sql_qtd_correctores, []);
$faturacao = DB::pesquisar($sql_faturacao, []);




// //VENDAS///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// $vendaspormes = 'SELECT COUNT(*) as vendas, extract(MONTH FROM vendas.momento) as mes FROM `vendas` GROUP BY mes';
// $resultadoVendaspormes = DB::pesquisar($vendaspormes,[]);
// $vendasv= "";
// $mesm ="";
// foreach($resultadoVendaspormes as $vendasvalor){
//   $vendasv= $vendasv . $vendasvalor['vendas'] . "-";
//   $mesm = $mesm . $vendasvalor['mes'] . "-";
// }
// setcookie("totalvenda", $vendasv, time() + (86400 * 30), "/"); // 86400 = 1 day
// setcookie("totalmes", $mesm, time() + (86400 * 30), "/");

// //ALUGUER///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// $aluguerpormes='SELECT COUNT(*) as aluguer, extract(MONTH FROM aluguer.data_alugado) as mes FROM `aluguer` GROUP BY mes';
// $resultadoAluguerpormes = DB::pesquisar($aluguerpormes,[]);
// $aluguerv= "";
// $mesm ="";
// foreach($resultadoAluguerpormes as $aluguervalor){
//  $aluguerv=$aluguerv .  $aluguervalor['aluguer'] . "-";
//  $mesm = $mesm .  $aluguervalor['mes'] . "-";
// }

// setcookie("totalaluguervalor", $aluguerv, time() + (86400 * 30), "/"); // 86400 = 1 day
// setcookie("totalaluguermes", $mesm, time() + (86400 * 30), "/");



// //IMOVEIS///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// $imoveispormes='SELECT COUNT(*) as imoveis, extract(MONTH FROM imovel.data_registo) as mes FROM `imovel` GROUP BY mes';
// $resultadoimoveispormes = DB::pesquisar($imoveispormes,[]);
// $imoveisv= "";
// $mesm ="";
// foreach($resultadoimoveispormes as $imoveisvalor){
//  $imoveisv=$imoveisv .  $imoveisvalor['imoveis'] . "-";
//  $mesm = $mesm .  $imoveisvalor['mes'] . "-";
// }

// setcookie("totalimoveisvalor", $imoveisv, time() + (86400 * 30), "/"); // 86400 = 1 day
// setcookie("totalimoveismes", $mesm, time() + (86400 * 30), "/");

// //USUARIOS///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// $interacoespormes='SELECT COUNT(*) as interacoes, extract(MONTH FROM usuario.data_criacao) as mes FROM `usuario` GROUP BY mes';
// $resultadointeracoespormes = DB::pesquisar($interacoespormes,[]);
// $interacoesv= "";
// $mesm ="";
// foreach($resultadointeracoespormes as $interacoesvalor){
//  $interacoesv=$interacoesv .  $interacoesvalor['interacoes'] . "-";
//  $mesm = $mesm .  $interacoesvalor['mes'] . "-";
// }

// setcookie("totalinteracoesvalor", $interacoesv, time() + (86400 * 30), "/"); // 86400 = 1 day
// setcookie("totalinteracoesmes", $mesm, time() + (86400 * 30), "/");





?>


<!DOCTYPE html>
<html lang="pt-pt">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>

    <!-- Favicons-->
    <link rel="icon" href="#" sizes="32x32">

     <!-- estilo do grafico chart-->
    <link rel="stylesheet" href="css/demo.css">
   
    <!-- materialize CSS-->
    <link href="css//materialize.css" type="text/css" rel="stylesheet">

     <!-- Estilo CSS-->
    <link href="css//style.css" type="text/css" rel="stylesheet">

    <!-- Aparte do scrollbar do sidebar -->
    <link href="css//perfect-scrollbar.css" type="text/css" rel="stylesheet">
  </head>

  <body>
    <!--  Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!--  HEADER -->
    <header id="header" class="page-topbar">
      <!-- header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-light-blue-cyan">
          <div class="nav-wrapper">

            <!--LogoTipo-->
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="index.php" class="brand-logo darken-1">
                     <!--<img src="images/logo/materialize-logo.png" alt="materialize logo">-->
                    <span class="logo-text hide-on-med-and-down">angoimoveis</span>
                  </a>
                </h1>
              </li>
            </ul>

            <!--Barra de pesquisa-->
            <div class="header-search-wrapper hide-on-med-and-down">
              <i class="material-icons">search</i>
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Pesquisar" />
            </div>

             <!--Icons do menu -->
            <ul class="right hide-on-med-and-down">

              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <!-- <img src="images/avataradmin.png" alt="avatar"> -->

                    <?php
                            if($_SESSION['imagemperfil_admin']==NULL){
                              echo '<img src="images/avataradmin.png" alt="avatar" >';
                            }else{
                              echo '<img src="'.$_SESSION['imagemperfil_admin'].'" alt="avatar">';
                            }
                            ?>
                    <i></i>
                  </span>
                </a>
              </li>

            
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" >
                  <i class="material-icons">notifications_none
                    <small class="notification-badge pink accent-2">2</small>
                  </i>
                </a>
              </li>
              
            </ul>
        

            <!-- Mensagem-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>Mensagens <span class="new badge">2</span> </h6>
              </li>

              <li class="divider"></li>
              
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle cyan small">person</span> Marcio comba</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 horas ago</time>
              </li>

              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle cyan small">person</span> Do whi le</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 dias ago</time>
              </li>

            </ul>

        
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">account_circle</i> Perfil</a>
              </li>
              
              <li class="bold">
                <a href="registos.php" class="waves-effect waves-cyan">
                    <i class="material-icons">dehaze</i>
                    <span class="nav-text">Registos</span>
                  </a>
              </li>
              <li class="bold">
                <a href="estatisticas.php" class="waves-effect waves-cyan">
                    <i class="material-icons">insert_chart</i>
                    <span class="nav-text">Estatisticas</span>
                  </a>
              </li>

              <li class="divider"></li>
             
              <li>
                <a href="logoutadmin.php" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Sair</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!--  MAIN -->
    <div id="main">
      <!--  WRAPPER -->
      <div class="wrapper">
          <!--  SIDEBAR NAV -->
          <aside id="left-sidebar-nav">
              <ul id="slide-out" class="side-nav fixed leftside-navigation">

                  <li class="user-details cyan darken-2">
                      <div class="row">
                          <div class="col col s4 m4 l4">
                            <?php
                            if($_SESSION['imagemperfil_admin']==NULL){
                              echo '<img src="images/avataradmin.png" alt="" class="circle responsive-img valign profile-image cyan">';
                            }else{
                              echo '<img src="'.$_SESSION['imagemperfil_admin'].'" alt="" class="circle responsive-img valign profile-image cyan">';
                            }
                            ?>
                          </div>
                          <div class="col col s8 m8 l8">
                              <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" ><?php echo $_SESSION['nome_admin']." ".$_SESSION['sobrenome_admin'];?>
                                  <i class="mdi-navigation-arrow-drop-down right"></i>
                              </a>
                              <p class="user-roal">Administrator</p>
                          </div>

                      </div>
                  </li>

                  <li class="no-padding">
                      <ul class="collapsible" data-collapsible="accordion">
                          <li class="bold">
                              <a href="index.php" class="waves-effect waves-cyan">
                                  <i class="material-icons">home</i>
                                  <span class="nav-text">Painel</span>
                              </a>
                          </li>
                          <li class="bold">
                              <a href="imovel.php" class="waves-effect waves-cyan">
                                  <i class="material-icons">account_balance</i>
                                  <span class="nav-text">Imoveis</span>
                              </a>
                          </li>


                          <li class="bold">
                              <a href="Notificação.php" class="waves-effect waves-cyan">
                                  <i class="material-icons">notifications</i>
                                  <span class="nav-text">Notificações</span>
                              </a>
                          </li>

                          <li class="bold">
                              <a href="Usuarios.php" class="waves-effect waves-cyan">
                                  <i class="material-icons">people</i>
                                  <span class="nav-text">Usuarios</span>
                              </a>
                          </li>

                          <li class="bold">
                              <a href="criarCorretor.php" class="waves-effect waves-cyan">
                                  <i class="material-icons">person_add</i>
                                  <span class="nav-text">Adicionar corretores</span>
                              </a>
                          </li>

                          <li class="bold">
                              <a href="Perfil.php" class="waves-effect waves-cyan">
                                  <i class="material-icons">person</i>
                                  <span class="nav-text">Perfil</span>
                              </a>
                          </li>

                          <li class="bold">
                    <a href="registos.php" class="waves-effect waves-cyan">
                        <i class="material-icons">dehaze</i>
                        <span class="nav-text">Registos</span>
                      </a>
                  </li>
                  <li class="bold">
                    <a href="estatisticas.php" class="waves-effect waves-cyan">
                        <i class="material-icons">insert_chart</i>
                        <span class="nav-text">Estatisticas</span>
                      </a>
                  </li>

                          <li class="bold">
                              <a href="logoutadmin.php" class="waves-effect waves-cyan">
                                  <i class="material-icons">keyboard_tab</i>
                                  <span class="nav-text">Sair</span>
                              </a>
                          </li>

                      </ul>
                  </li>
              </ul>
              <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
                  <i class="material-icons">menu</i>
              </a>
          </aside>
