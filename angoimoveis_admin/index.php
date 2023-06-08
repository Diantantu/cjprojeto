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
                        <i class="material-icons background-round mt-5">shopping_cart</i>
                        <p>Vendidos</p>
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
                  <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">perm_identity</i>
                        <p>Corretores</p>
                      </div>
                      <div class="col s5 m5 right-align">
                        <h5 class="mb-0">0</h5>
                        <p class="no-margin">Novos</p>
                        <p><?php echo $qtd_correctores[0]['correctores'];?></p>
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
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p>Faturação</p>
                      </div>
                      <div class="col s5 m5 right-align">
                        <h5 class="mb-0">0</h5>
                        <p class="no-margin">Novos</p>
                        <p><?php 
                        if( $faturacao[0]['faturacao'] != NULL )
                          echo $faturacao[0]['faturacao'];
                        else
                          echo 0?>,00 kz</p>
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
  
      <script>
       M.AutoInit();
      </script>


<script src="js/Chart.js"></script>
<script src="js/legend.js"></script>
<script src="js/demo.js"></script>
  </body>
</html>