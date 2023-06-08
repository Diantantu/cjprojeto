<?php

include('inc/header.php');

$sql='SELECT * FROM `listar_interesse` where proprietario=? ORDER BY dataInteresse DESC';
$sqlnotificacoesvisualizadas = 'UPDATE interesse_imovel SET visualizado=1';
$resultado = DB::pesquisar($sql,[$_SESSION['id_corrector']]);
DB::inserir($sqlnotificacoesvisualizadas,[]);

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
                    <li><a href="index.php">Home</a>
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
                      <table  id="tabelanotificacao">
                        <thead>
                          <tr>
                            <th data-field="id">Nome do remetente</th>
                            <th data-field="name">Email do remetente</th>
                            <th data-field="name">Data</th>
                            <th data-field="name">Notificação</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php

                          foreach($resultado as $dados){
                            //<tr onclick="confirmarimovel(this.rowIndex, '.$dados['idimovel'].')"  class="rowhover">
                            echo'
                            <tr onclick="confirmarimovel(this.rowIndex, '.$dados['idimovel'].')"  class="rowhover">
                            <td>'.$dados['nome'].' '.$dados['sobrenome'].'</td>
                            <td>'.$dados['email'].'</td>
                            <td>'.$dados['dataInteresse'].'</td>
                            <td>Está interessado em um seu imovel</td>
                          </tr>
                            ';

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
     <script>
       function confirmarimovel( indiceLinha, valor)
       { 
        
          let tabela = document.getElementById('tabelanotificacao');
          let linhaindicada= tabela.rows[indiceLinha]
          let clientesdetalhes = linhaindicada.getElementsByTagName('td')[1].innerHTML
          document.cookie = 'imoveldetalhesnotificacao' + '=' + valor;
          document.cookie = 'clientedetalhes' + '=' + clientesdetalhes;
          document.location = 'confirmarvenda_imovel.php';
      }

     </script>
  </body>
</html>