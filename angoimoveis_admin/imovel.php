<?php
include('inc/header.php');
$sqlimoveispublicados = 'SELECT imovel.*, corrector.primeironome, corrector.ultimonome, corrector.telemovel, corrector.email FROM imovel INNER join corrector ON imovel.proprietario=corrector.idcorrector';


$sqlimoveisDisponiveis = 'SELECT imovel.*, provincias.nome as cidade, corrector.primeironome, corrector.ultimonome, corrector.telemovel, corrector.email FROM imovel INNER join corrector ON imovel.proprietario=corrector.idcorrector inner join provincias on imovel.provincia=provincias.idprovincias WHERE disponibilidade = 2 ';

$sqlimoveisalugados = 'SELECT imovel.*, aluguer.data_alugado, aluguer.qtd_meses, corrector.primeironome, corrector.ultimonome, corrector.telemovel, corrector.email FROM imovel INNER join corrector ON imovel.proprietario=corrector.idcorrector inner join aluguer on imovel.id=aluguer.imovel WHERE disponibilidade= 1';

$resultadoImoveis = DB::pesquisar($sqlimoveispublicados,[]);
$resultadoimoveisDisponiveis = DB::pesquisar($sqlimoveisDisponiveis,[]);
$resultadoimoveisAlugados = DB::pesquisar($sqlimoveisalugados,[]);





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
                <h5 class="breadcrumbs-title">Imoveis</h5>

                <ol class="breadcrumbs">
                  <li> <a href="index.php">Painel</a> </li> 
                  <li class="active">Imoveis</li>
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
            <li class="tab col s3"><a class="active" href="#test-1">Publicados</a></li>
            <li class="tab col s3"><a href="#test-2">Disponiveis</a></li>
            <li class="tab col s3"><a href="#test-3">Em aluguer</a></li>
          </ul>
          
          <!--SEPARADOR-->
          <div class="divider"></div>
          <div class="divider"></div>
          
          <!--Publicados-->
          <div id="test-1" class="col s12 cor">
            <div class="container">
              <div class="row">
                <?php




                foreach($resultadoImoveis as $imoveis){

                  $disponibilidade =(int) $imoveis['disponibilidade'];
                  $nomedisponibilidade = null;

                  switch ($disponibilidade) {
                    case 2:
                      $nomedisponibilidade = 'Arrenda-se';
                        break;
                    case 3:
                      $nomedisponibilidade = 'Indisponivel';
                        break;
                    case 1:
                      $nomedisponibilidade = 'Arrendada';
                        break;
                    default:
                       $nomedisponibilidade='Indisponivel';
                }



                  echo '

                  <div class="col s12 m4 l4">
                    <div class="card">
                      <!--Imagem do imovel-->
                      <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="'.$imoveis['imagemperfil'].'" alt="office">
                      </div>
  
                      <!--Texto frontal do imovel-->
                      <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">'.$nomedisponibilidade.'
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p><a href="#">Disponivel</a> </p>
                      </div>
  
                      <!--Aparte da descrição do imovel quando apertão no icon-->
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Vende-se
                            <i class="material-icons right">close</i>
                          </span>
                        <p>'.$imoveis['descricao'].'</p>
                      
                        <div class="iconMovel"> 
                          <i class="material-icons">perm_identity</i> 
                          <p>'.$imoveis['primeironome'].' '.$imoveis['ultimonome'].'</p>  
                        </div>
  
                        <div class="iconMovel"> 
                          <i class="material-icons">phone</i>
                          <p>'.$imoveis['telemovel'].'</p>  
                        </div> 
  
                        <div class="iconMovel"> 
                          <i class="material-icons">crop</i> 
                          <p>'.$imoveis['email'].'</p> 
                        </div>
                        

                        
                        <div class="iconMovel"> 
                          <i class="material-icons">attach_money</i> 
                          <p> '.$imoveis['preco'].'kz</p>  
                        </div> 
  
                        <button href="#" type="submit"  class="btn waves-effect waves-light blue darken-1 right" id="btn_Interece" >Bloquear
                          <i class="material-icons right">lock</i>
                        </button>
                        
                      </div>
                    </div>
                  </div>
                  ';
                }


                ?>
           
              </div>

               <!--pagination-->

              
            </div>
          </div>

          <!--Vendidos-->
          <div id="test-2" class="col s12 white">
            <div class="container">
              <div class="row">



              <?php 
              
              foreach($resultadoimoveisDisponiveis as $imoveis){

                $disponibilidade =(int) $imoveis['disponibilidade'];
                $nomedisponibilidade = null;
                $nomedisponibilidade = 'Arrenda-se';
                     



                echo '
    
                <div class="col s12 m4 l4">
                <div class="card">
                  <!--Imagem do imovel-->
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="'.$imoveis['imagemperfil'].'" alt="office">
                  </div>

                  <!--Texto frontal do imovel-->
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">'.$nomedisponibilidade.'
                        <i class="material-icons right">more_vert</i>
                    </span>
                    <p><a href="#">Indisponivel</a> </p>
                  </div>

                  <!--Aparte da descrição do imovel quando apertão no icon-->
                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Vende-se
                        <i class="material-icons right">close</i>
                      </span>
                      <p>'.$imoveis['descricao'].'</p>
                      
                      <div class="iconMovel"> 
                        <i class="material-icons">perm_identity</i> 
                        <p>'.$imoveis['primeironome'].' '.$imoveis['ultimonome'].'</p>  
                      </div>

                      <div class="iconMovel"> 
                        <i class="material-icons">phone</i>
                        <p>'.$imoveis['telemovel'].'</p>  
                      </div> 

                      <div class="iconMovel"> 
                        <i class="material-icons">crop</i> 
                        <p>'.$imoveis['email'].'</p> 
                      </div>
                      

                      
                      <div class="iconMovel"> 
                        <i class="material-icons">attach_money</i> 
                        <p> '.$imoveis['preco'].'kz</p>  
                      </div> 

                    <button href="#" type="submit"  class="btn waves-effect waves-light blue darken-1 right" id="btn_Interece" >Bloquear
                      <i class="material-icons right">lock</i>
                    </button>
                    
                  </div>
                </div>
              </div>
              ';

              }    

              ?>

              </div>

                <!--pagination-->

            </div>
          </div>

          <!--Alugados-->
          <div id="test-3" class="col s12 cor">
              <div class="container">
         

                  <div class="row">
                     <!--imoveis Em aluguer-->




                     <?php

                      foreach($resultadoimoveisAlugados as $imoveis){
                        $disponibilidade =(int) $imoveis['disponibilidade'];
                        $nomedisponibilidade = null;
                        $nomedisponibilidade = 'Arrendada';
                   
      
      

                        echo '
                        
           
                        <div class="col s12 m4 l4">
                        <div class="card">
                          <!--Imagem do imovel-->
                          <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="'.$imoveis['imagemperfil'].'" alt="office">
                          </div>
      
                          <!--Texto frontal do imovel-->
                          <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">'.$nomedisponibilidade.'
                                <i class="material-icons right">more_vert</i>
                            </span>
                            <p><a href="#">Indisponivel</a> </p>
                          </div>
      
                          <!--Aparte da descrição do imovel quando apertão no icon-->
                          <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Vende-se
                                <i class="material-icons right">close</i>
                              </span>
                              <p>'.$imoveis['descricao'].'</p>
                      
                              <div class="iconMovel"> 
                                <i class="material-icons">perm_identity</i> 
                                <p>'.$imoveis['primeironome'].' '.$imoveis['ultimonome'].'</p>  
                              </div>
        
                              <div class="iconMovel"> 
                                <i class="material-icons">phone</i>
                                <p>'.$imoveis['telemovel'].'</p>  
                              </div> 
        
                              <div class="iconMovel"> 
                                <i class="material-icons">crop</i> 
                                <p>'.$imoveis['email'].'</p> 
                              </div>
                              
      
                              
                              <div class="iconMovel"> 
                                <i class="material-icons">attach_money</i> 
                                <p> '.$imoveis['preco'].'kz</p>  
                              </div> 
        
                            <button href="#" type="submit"  class="btn waves-effect waves-light blue darken-1 right" id="btn_Interece" >Bloquear
                              <i class="material-icons right">lock</i>
                            </button>
                            
                          </div>
                        </div>
                      </div>
                      ';


                      }

                      ?>
                  </div>
                  
                         <!--pagination-->

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

    <script>
     M.AutoInit();
    </script>
</body>

</html>