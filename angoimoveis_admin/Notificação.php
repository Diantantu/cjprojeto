<?php
include('inc/header.php');

$sql='SELECT *  FROM `listar_interesse` ORDER BY dataInteresse DESC';
$resultadonotificacao = DB::pesquisar($sql,[]);

?>
        <!-- //////////////////////////////////////////////////////////////////////////// -->

        <!-- Panel do centro -->
        <section id="content">
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            <!-- Barra de pesquisa do mobile --- screen -->
            <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Pesquisar">
            </div>
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">Notificações</h5>
                  <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a>
                    </li>
                   
                    <li class="active">Notificações</li>
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
                            <th data-field="id">Corrector</th>
                            <th data-field="name">Cliente</th>
                            <th data-field="name">Ocorrencia</th>
                            <!-- <th data-field="name">Ocorrencia</th> -->
                          </tr>
                        </thead>
                        <tbody>
                        <?php

                            foreach($resultadonotificacao as $notificacao){

                              echo '
                              
                              <tr>
                             
                              <td>arcanjomimoso13@gmail.com</td>
                              <td>
                                <a class="btn waves-effect waves-light red accent-4" id="btn_Interece">
                                  <i class="material-icons left">delete</i> Excluir
                                </a>
                              </td>
                            </tr>
                              
                              ';
                            }

?>  
>


                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        
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
        <span class="right hide-on-small-only"> Design feito por Jocelmo Silva</span>
      </div>
    </div>
  </footer>
  <!-- Fim do FOOTER -->

    <!-- ================================================Scripts================================================ -->
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