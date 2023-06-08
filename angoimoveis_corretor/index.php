<?php
include('inc/header.php');


?>
    <!-- //////////////////////////////////////////////////////////////////////////// -->

        <!-- Panel do centro -->
        <section id="content">
          
          <!--start container-->
          <div class="container">
            <!--card stats start-->
            <div id="card-stats">
              <div class="row mt-1">

                <div class="col s12 m6 l3">
                  <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">chat</i>
                        <p>Mensagens</p>
                      </div>
                      <div class="col s5 m5 right-align">
                        <h5 class="mb-0">0</h5>
                        <p class="no-margin">Novos</p>
                        <p><?php echo $qtd_imoveis_vendidos[0]['vendidos'];?></p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col s12 m6 l3">
                  <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">store_mall_directory</i>
                        <p>Imoveis</p>
                      </div>
                      <div class="col s5 m5 right-align">
                        <h5 class="mb-0">0</h5>
                        <p class="no-margin">Novos</p>
                        <p><?php echo $qtd_imoveis[0]['imoveis'];?></p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col s12 m6 l3">
                  <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s7 m7">
                      <i class="material-icons background-round mt-5">check_box</i>
                        
                        <p>Alugados</p>
                      </div>
                      <div class="col s5 m5 right-align">
                        <h5 class="mb-0">0</h5>
                        <p class="no-margin">Novos</p>
                        <p><?php echo $qtd_imoveis_alugados[0]['alugados'];?></p>
                      </div>
                    </div>
                  </div>
                </div>
<!-- gradient-45deg-green-teal -->
                <div class="col s12 m6 l3">
                  <div class="card gradient-shadow min-height-100 white-text" style="background: linear-gradient(60deg,#ef5350,#e53935);" >
                    <div class="padding-4">
                      <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">assessment</i>
                        <p>Interações</p>
                      </div>
                      <div class="col s5 m5 right-align">
                        <h5 class="mb-0">0</h5>
                        <p class="no-margin">Novos</p>
                        <p><?php echo $qtd_interacoes[0]['interacoes'];?></p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            
            <div class="container">
              <div class="row mt-1">
                <div class="col s12 m6 l6 ">
                  <div>
                    <canvas id="lineChart" width="500" height="400"></canvas>
                    <div id="lineLegend"></div>
                 </div>
                </div>

                <div class="col s12 m6 l6">
                  <div>
                    <canvas id="barsChart" width="500" height="400"></canvas>
                    <div id="barsLegend"></div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
       
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
    <script src='js/sweetalert.min.js'></script>

    <script>
     M.AutoInit();
    </script>

     <!--serve para os graficos-->
    <script src="js/Chart.js"></script>
    <script src="js/legend.js"></script>
    <script src="js/demo.js"></script>
    <script>



      <?php
      if($_SESSION['action']==12){
        echo 'swal("Sucesso ao cadastrar o imovel!", "O seu imovel foi registado!", "success");';
        $_SESSION['action']=0;
      }
      ?>
    </script>
  </body>
</html>