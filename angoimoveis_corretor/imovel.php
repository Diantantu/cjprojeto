<?php
include('inc/header.php');

$sqlimoveispublicados = 'SELECT imovel.*, provincias.nome as cidade FROM imovel inner join provincias on imovel.provincia=provincias.idprovincias WHERE disponibilidade = 2 AND proprietario=?';
$sqlimoveisvendidos = 'SELECT * FROM imovel WHERE disponibilidade = 5 AND proprietario=?';
$sqlimoveisalugados = 'SELECT imovel.*, aluguer.data_alugado, aluguer.qtd_meses FROM imovel inner join aluguer on imovel.id=aluguer.imovel WHERE disponibilidade= 1 AND imovel.proprietario=?
';

$resultadoImoveis = DB::pesquisar($sqlimoveispublicados,[$_SESSION['id_corrector']]);
$resultadoimoveisVendidos = DB::pesquisar($sqlimoveisvendidos,[$_SESSION['id_corrector']]);
$resultadoimoveisAlugados = DB::pesquisar($sqlimoveisalugados,[$_SESSION['id_corrector']]);




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
            <li class="tab col s3"><a class="active" href="#test-1">Disponiveis</a></li>
            <li class="tab col s3"><a href="#test-3">Em aluguer</a></li>
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
                    <!--imoveis publicados-->
                      <?php

                        foreach($resultadoImoveis as $imovel){


                          echo'
                          <div class="col s12 m4 l4">
                          <div class="card sticky-action">
                            <div class="card-image waves-effect waves-block waves-light">
                              <img class="activator" src="'.$imovel['imagemperfil'].'">
                            </div>
                            
                            <div class="card-content">
                              <span class="card-title activator grey-text text-darken-4">Arrenda-se
                                  <i class="material-icons right">more_vert</i>
                              </span>
                              <p><a href="#!">Disponivel</a></p>
                            </div>
        
                            <div class="card-action">
                               <!-- Modal Trigger -->
                           
                              <a href="#modal1" type="submit"  class="modal-trigger btn waves-effect waves-light blue darken-1 right" id="btn_Interece" >Editar
                                <i class="material-icons right">edit</i>
                              </a>
                              
                              </div>
                              
                            <!-- Modal Structure -->
                            <div id="modal1" class="modal">
                            <form method="POST" action="atualizar_imovel.php">
                              <div class="modal-content">
                                <h3 class="alterSenha">Por favor preenche o formulario</h3>
                                <div class="container">
                                  <div class="row">
        
                                    <div class="input-field col s12 m6 l6">
                                      <div class="input-field col s12">
                                        <label for="" class="label">Digite a descrição</label>
                                        <input type="text" value="'.$imovel['descricao'].'" required name="descricao" class="mt-3 mb-5 tamanhoInput browser-default ">
                                        <input type="text" name="id" value="'.$imovel['id'].'" hidden>
                                      </div>
                                    </div>
        
                                    <div class="input-field col s12 m6 l6">
                                      <div class="input-field col s12">
                                        <label for="" class="label">Provincia</label>
                                        <input type="text" value="'.$imovel['provincia'].'" required name="provincia" class="mt-3 mb-5 tamanhoInput browser-default ">
                                      </div>
                                    </div>
    
                                    <div class="input-field col s12 m6 l6">
                                      <div class="input-field col s12">
                                        <label for="" class="label">Municipio</label>
                                        <input type="text" name="municipio" required value="'.$imovel['municipio'].'" class="mt-3 mb-5 tamanhoInput browser-default ">
                                      </div>
                                    </div>
    
                                    <div class="input-field col s12 m6 l6">
                                      <div class="input-field col s12">
                                        <label for="" class="label">Endereço</label>
                                        <input type="text" name="bairro" required value="'.$imovel['bairro'].'" class="mt-3 mb-5 tamanhoInput browser-default ">
                                      </div>
                                    </div>
    

                                    <div class="input-field col s12 m6 l6">
                                      <div class="input-field col s12">
                                        <label for="" class="label">Preço da venda</label>
                                        <input type="number" name="preco" required value="'.$imovel['preco'].'" class="mt-3 mb-5 tamanhoInput browser-default ">
                                      </div>
                                    </div>
    
                                     <div class=" col s12 m6 l6">
                                       <select name="disponibilidade" class="browser-default mt-4" required>
                                         <option value="" disabled selected>Selecione o estado do imovel</option>
                                         <option value="3">Indisponivel</option>
                                         <option value="2">Arrenda-se</option>
                                       </select>
                                    </div>
                                 
        
                                  </div>
        
                                </div>
                              </div>
    
                              <div class="modal-footer">
                                <div class="container">
                                  <div class="row">
    
                                    <div class="col 12 m6"></div>
    
                                    <div class="col s12 m6 ">
                             
                                      
                                      <div class="col s12  m6 l6">
                                        <button class="btn waves-effect  green btnSalvar" id="btn_Interece"  type="submit" name="action">Salvar
                                          <i class="material-icons right">send</i>
                                        </button>
                                      </div>
                                    </div>
                                  
                                  </div>
                                </div>
                              </div>
                              </form>
                            </div>
        
                            <div class="card-reveal">
                              <span class="card-title grey-text text-darken-4">Arrenda-se
                                  <i class="material-icons right">close</i>
                                  </i>
                                </span><br>
                                <span style="font-weight:bold">Provincia:</span><span >'.$imovel['cidade'].' </span><br>
                                <span style="font-weight:bold">Municipio:</span><span >'.$imovel['municipio'].'</span><br>
                                <span style="font-weight:bold">Bairro:</span><span >'.$imovel['bairro'].'</span><br>
                                <span style="font-weight:bold">Preco:</span><span >'.$imovel['preco'].'.00 kz</span><br>
                              <p>'.$imovel['descricao'].'</p>
        
                            <div class="iconMovel"> <i class="material-icons">description</i><p>'.$imovel['descricao'].'</p>  </div> 
                            
                            </div>
        
                          </div>
                        </div>
                          ';

                        }


                      ?>
                    
    
                  </div>
                </div>
              </div>

               <!--pagination-->
            
              
            </div>
          </div>

          <!--Vendidos-->
          <!-- <div id="test-2" class="col s12 white">
            <div class="container">
              <div class="row">
                <?php

                    foreach($resultadoimoveisVendidos as $imoveisvendidos){

                      echo '
                      <div class="col s12 m4 l4">
                      <div class="card">
                        <!--Imagem do imovel-->
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="'.$imoveisvendidos['imagemperfil'].'" alt="office">
                        </div>
    
                        <!--Texto frontal do imovel-->
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Apartamento
                              <i class="material-icons right">more_vert</i>
                          </span>
                          <p><a href="#">Vendido</a> </p>
                        </div>
    
                        <!--Aparte da descrição do imovel quando apertão no icon-->
                        <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4">Vendido
                              <i class="material-icons right">close</i>
                            </span>
                          <p>Esse imovel foi vendido</p>
                        
                          <div class="iconMovel"> 
                            <i class="material-icons">perm_identity</i> 
                            <p> Do whi le</p>  
                          </div>
    
                          <div class="iconMovel"> 
                            <i class="material-icons">event_available</i> 
                            <p>12/02/1999</p>  
                          </div> 
    
                          <div class="iconMovel"> 
                            <i class="material-icons">phone</i>
                            <p>+244 944 113 252</p>  
                          </div> 
    
                          <div class="iconMovel"> 
                            <i class="material-icons">location_on</i> 
                            <p>Angola, luanda cazenga</p>  
                          </div>
    
                          <div class="iconMovel"> 
                            <i class="material-icons">attach_money</i> 
                            <p> 1,000,000 kz</p>  
                          </div> 
                          
                        </div>
                      </div>
                    </div>
                      ';

                    }

                ?>


              </div>

            </div>
          </div> -->

          <!--Alugados-->
          <div id="test-3" class="col s12 cor">
              <div class="container">
         

                  <div class="row">
                     <!--imoveis Em aluguer-->

                     <?php
                        foreach($resultadoimoveisAlugados as $imovelalugado){
                          echo '
                          <div class="col s12 m4 l4">
                          <div class="card sticky-action">
                            <div class="card-image waves-effect waves-block waves-light">
                              <img class="activator" src="'.$imovelalugado['imagemperfil'].'">
                            </div>
                            
                            <div class="card-content">
                              <span class="card-title activator grey-text text-darken-4">Vivenda
                                  <i class="material-icons right">more_vert</i>
                              </span>
                              <p><a href="#!">Arrendada</a></p>
                              <p>Prazo:</p>
                              <p id="'.$imovelalugado['id'].';'.$imovelalugado['data_alugado'].';'.$imovelalugado['qtd_meses'].'" class="countdown">
                              </p>
                            </div>
        

                              <div class="card-action">
                              <!-- Modal Trigger -->
                          
                 
                             
                             </div>
        
                            <!-- Modal Trigger -->
        
                            <!-- Modal Structure -->
                            <div id="modal1" class="modal">
                              <div class="modal-content">
                                <h4>Modal Header</h4>
                                <p>A bunch of text</p>
                              </div>
                              <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Concordo</a>
                              </div>
                            </div>
        
                            <div class="card-reveal">
                              <span class="card-title grey-text text-darken-4">Alugado
                                  <i class="material-icons right">close</i>
                                  </i>
                                </span>
                              <p>Esse imovel foi alugado.</p>
        
                             <div class="iconMovel"> <i class="material-icons">perm_identity</i> <p>'.substr($imovelalugado['descricao'], 0, 30).'</p>  </div>
                             <div class="iconMovel"> <i class="material-icons">event_available</i><p> '.$imovelalugado['data_registo'].'</p>  </div> 
                             <div class="iconMovel"> <i class="material-icons">phone</i><p>'.$imovelalugado['provincia'].'</p>  </div>  
                             <div class="iconMovel"> <i class="material-icons">location_on</i><p>'.$imovelalugado['municipio'].'</p>  </div> 
                             <div class="iconMovel"> kz<p>  1,000,000 kz</p>  </div> 
                            
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
        <script>

          let countdowns = document.getElementsByClassName("countdown")
          for(let i = 0; i < countdowns.length; i++)
          {
            let valores = countdowns[i].id.split(';')
            carregar_countdown(valores[0], valores[1], valores[2])
          }


          function carregar_countdown(id, data, meses){

          
              // Set the date we're counting down to
              var newDate = new Date(data).getTime();

              var countDownDate = addMonths(new Date(data), meses);


              // Update the count down every 1 second
              var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                document.getElementById(id+';'+data+';'+meses).innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

                // If the count down is finished, write some text
                if (distance < 0) {
                  clearInterval(x);
                  document.getElementById(id+';'+data+';'+meses).innerHTML = "Arrenda-se";
                }
              }, 1000);


          }

            function addMonths(date, months) {
                var d = date.getDate();
                date.setMonth(date.getMonth() + +months);
                if (date.getDate() != d) {
                  date.setDate(0);
                }
                return date;
            }

</script>
</body>

</html>