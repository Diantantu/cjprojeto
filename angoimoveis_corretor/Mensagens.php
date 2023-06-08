<?php
include('inc/header.php');

$sql = "SELECT conversa.cliente as id, usuario.nome, usuario.sobrenome FROM aluguer_casas.conversa inner join usuario 
on conversa.cliente=usuario.id WHERE corretor=? group by cliente";
$sql_ultima_mensagem = "SELECT mensagem from conversa where cliente=? and corretor=? order by id desc limit 1";
$usuarios = [];
$ultima_mensagem = [];
$result = DB::pesquisar($sql, [$_SESSION['id_corrector']]);
foreach($result as $user){
  $id = $user['id'];
  $mensagem = DB::pesquisar($sql_ultima_mensagem, [$id, $_SESSION['id_corrector']]);
  $ultima_mensagem[$id] = $mensagem[0]['mensagem'];


}


?>
        <!-- //////////////////////////////////////////////////////////////////////////// -->

        <!-- START CONTENT -->
        <section id="content">
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            <!-- BARRA DE PESQUISA PARA DESIGN MOBILE -->
            <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Pesquisar">
            </div>

            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">Mensagens</h5>
                  <ol class="breadcrumbs">
                    <li> <a href="index.php">Home</a> </li>
                    <li class="active">Mensagens</li>
                  </ol>
                </div>
              </div>
            </div>

          </div>
          <!--breadcrumbs end-->

          <!--Panel central-->
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <div id="striped-table">
                  <div class="row">
                    <div class="col s12">
                      <table class="striped">
                        <thead>
                          <tr>
                            <th data-field="id">Nome completo</th>
                            <th data-field="name">Mensagens</th>
                          </tr>
                        </thead>
                        <tbody>
  <?php
    foreach( $result as $user)
    {
      echo '<tr>
        <td><img src="images/avatar/face21.jpg" class=" img-table" alt="image"> '.$user['nome'].
        ' '.$user['sobrenome'].'</td>
        <td>'.$ultima_mensagem[$user['id']].'</td>

        <!--botão da tabela-->
        <td> 
          <a href="message.php" class="btn waves-effect waves-light green darken-3" id="btn_Interece">
            <i class="material-icons left">comment</i> Responder
          </a>
        </td>
      </tr>';
    }

  ?>      
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </section>
      
      </div>
      <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

     <!-- FOOTER -->
    <footer class="page-footer gradient-45deg-light-blue-cyan">
      <div class="footer-copyright">
        <div class="container">
          <span>Copyright © 2023, Todos direitos reservado.</span>
          <span class="right hide-on-small-only"> Design feito por angoimoveis</span>
        </div>
      </div>
    </footer>
    <!-- Fim do FOOTER -->

    <!-- ================================================Scripts ================================================ -->
        <!-- jQuery Library -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
    <!--plugins.js - serve para o Loading-->
    <script type="text/javascript" src="js/plugins.js"></script>

    <script>
     M.AutoInit();
    </script>
  </body>
</html>