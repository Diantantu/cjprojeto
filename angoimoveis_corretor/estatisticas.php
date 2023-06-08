<?php
include('inc/header.php');

$interessesByImoveis = 'SELECT imovel, imovel.municipio, imovel.preco, count(idInteresse) as interesseCount, imovel.proprietario FROM aluguer_casas.interesse_imovel inner join 
imovel on interesse_imovel.imovel=imovel.id where imovel.proprietario=? group by imovel';

$receitasByImoveis = 'SELECT aluguer.qtd_meses, aluguer.imovel as casa, imovel.preco, imovel.municipio from aluguer inner join imovel on aluguer.imovel=imovel.id where aluguer.proprietario=? group by imovel';

$resultadoInteresses = DB::pesquisar($interessesByImoveis,[$_SESSION['id_corrector']]);
$resultadoAlugados = DB::pesquisar($receitasByImoveis,[$_SESSION['id_corrector']]);




?>
      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- PANEL DO CENTRO -->
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
                <h5 class="breadcrumbs-title">Dados Estatisticos</h5>

                <ol class="breadcrumbs">
                  <li> <a href="index.php">Painel</a> </li>
                  <li class="active">Estatisticas</li>
                </ol>

              </div>      
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        
        <!--start container-->
        <div class="container">
          
          <!--SEPARADOR-->
          <div class="divider"></div>
          <div class="divider"></div>

          <ul id="tabs-demo" class="tabs">
            <li class="tab col s3"><a class="active" href="#test-1">Interesses</a></li>
            <li class="tab col s3"><a href="#test-3">Receitas</a></li>
          </ul>
          
          <!--SEPARADOR-->
          <div class="divider"></div>
          <div class="divider"></div>
          
          <!--Publicados-->
          <div id="test-1" class="col s12">
            <div class="container">
              <div class="row">
           
                <div class="col s12 m12 l12">
                  <div class="row">
                    <!--imoveis disponiveis-->
                    <p hidden id="dados_interesses_imoveis"> <?php echo json_encode($resultadoInteresses);?></p>

                    <canvas id="interesses_imoveis" style="width:100%;max-width:700px"></canvas>
                    
    
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!--Receitas-->
          <div id="test-3" class="col s12 cor">
              <div class="container">
         

                  <div class="row">
                     <!--Receitas-->
                    
                    <p hidden id="dados_receitas_imoveis"> <?php echo json_encode($resultadoAlugados);?></p>

                    <canvas id="receitas_imoveis" style="width:100%;max-width:700px"></canvas>
                    

                  </div>
           
              </div>
          </div>
          
        </div>

        </div>
        <!--Fim do container-->

      </section>
    </div>
      <!-- Fim do WRAPPER -->
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

   

    <!-- ================================================ Scripts ================================================ -->
       <!-- jQuery Library -->
       <script type="text/javascript" src="js/jquery.min.js"></script>
       <!--materialize js-->
       <script type="text/javascript" src="js/materialize.min.js"></script>
       <script type="text/javascript" src="js/materialize.js"></script>
       <!--scrollbar-->
       <script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
       <!--plugins.js - serve para o Loading-->
       <script type="text/javascript" src="js/plugins.js"></script>
   
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
       <script>M.AutoInit();</script>
       <script type="text/javascript" src="js/estatisticas.js">

        

       </script>
</body>

</html>