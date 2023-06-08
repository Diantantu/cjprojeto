<?php
include('inc/header.php');
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
                    <li> <a href="index.html">Dashboard</a> </li>
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
                          <tr>
                            <td><img src="images/avatar/face21.jpg" class=" img-table Mmargin" alt="image"> Do whi le </td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem numquam </td>

                            <!--botão da tabela-->
                            <td> 
                              <a class="btn waves-effect waves-light green darken-3" id="btn_Interece">
                                <i class="material-icons left">comment</i> Responder
                              </a>

                              <a class="btn waves-effect waves-light red accent-4" id="btn_Interece">
                                <i class="material-icons left">delete</i> Excluir
                              </a>
                            </td>
                          </tr>

                          <tr>
                            <td><img src="images/avatar/face13.jpg" class=" img-table Mmargin" alt="image" > Marcio comba </td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem numquam </td>

                            <!--botão da tabela-->
                            <td> 
                              <a class="btn waves-effect waves-light green darken-3 " id="btn_Interece">
                                <i class="material-icons left">comment</i> Responder
                              </a>

                              <a class="btn waves-effect waves-light red accent-4 " id="btn_Interece">
                                <i class="material-icons left">delete</i> Excluir
                              </a>
                            </td>
                          </tr>
                         
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
          <span class="right hide-on-small-only"> Design feito por Jocelmo Silva</span>
        </div>
      </div>
    </footer>
    <!-- Fim do FOOTER -->

    <!-- ================================================Scripts ================================================ -->
     <!-- jQuery Library -->
     <script type="text/javascript" src="js/jquery.min.js"></script>
     <!--materialize js-->
     <script type="text/javascript" src="js/materialize.min.js"></script>
     <!--scrollbar-->
     <script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
     <!--plugins.js - serve para o Loading-->
     <script type="text/javascript" src="js/plugins.js"></script>
  </body>
</html>