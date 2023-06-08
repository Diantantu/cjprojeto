<?php
include('inc/header.php');
$sqlselectusuarios = 'SELECT * FROM usuario';
$sqlselectcorrectores = 'SELECT * FROM corrector';


$resultadoUsuarios = DB::pesquisar($sqlselectusuarios);
$resultadoCorrectores = DB::pesquisar($sqlselectcorrectores);



?>
      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- PANEL DO CENTRO -->
      <section id="content">
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <!-- BARRA DE PESQUISA PARA DESIGN MOBILE -->
          <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
          </div>

          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title">Usuarios</h5>

                <ol class="breadcrumbs">
                  <li> <a href="index.php">Dashboard</a> </li>
                  <li class="active">Usuarios</li>
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
             <li class="tab col s3"><a class="active" href="#test-1">Corretores</a></li>
             <li class="tab col s3"><a href="#test-2">Clientes</a></li>
           </ul>
           
           <!--SEPARADOR-->
           <div class="divider"></div>
           <div class="divider"></div>
           
           <!--Corretor-->
           <div id="test-1" class="col s12 cor">
             <div class="container">
               <div class="row mb-3">
               <?php

               foreach($resultadoCorrectores as $correctores){

                echo '               
            
                <div class="col s12 m4 l4 mt-3">
                  <div id="profile-card" class="card">
    
                    <!--img do card-->
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/gallary/3.png" alt="user bg">
                    </div>
    
                    <div class="card-content">
                      <!--Img do perfil-->
                     
    
                      <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                        <i class="material-icons">info_outline</i>
                      </a>
    
                      <div class="iconMovel mt-5"> <i class="material-icons">perm_identity</i> <p>'.$correctores['primeironome'].' '.$correctores['ultimonome'].'</p> </div>
                      <div class="iconMovel"> <i class="material-icons">call</i> <p>'.$correctores['telemovel'].'</p> </div>
                      <div class="iconMovel"> <i class="material-icons">email</i> <p>'.$correctores['email'].'</p> </div>
    
                    </div>
    
                    <!--Informações--- depois de click no botão-->
                    <div class="card-reveal">
    
                      <span class="card-title grey-text text-darken-4">'.$correctores['primeironome'].' '.$correctores['ultimonome'].'
                        <i class="material-icons right">close</i>
                      </span>
    
                      <p>Informações do usuario.</p>
    
                      <div class="iconMovel"> <i class="material-icons">call</i> <p>'.$correctores['telemovel'].'</p> </div>
                      <div class="iconMovel"> <i class="material-icons">email</i> <p>'.$correctores['email'].'</p> </div>
                      <div class="iconMovel"> <i class="material-icons">event_available</i> <p>'.$correctores['nascimento'].'</p> </div>
                     
    
                      <button type="submit"  class="btn waves-effect waves-light green darken-3 right " id="btn_Interece">Bloquear
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
 
           <!--Clientes-->
           <div id="test-2" class="col s12 cor">
             <div class="container">
               <div class="row mb-3">

               <?php
                  foreach($resultadoUsuarios as $usuario){

                echo '     
                        
                <div class="col s12 m4 l4 mt-3">
                <div id="profile-card" class="card">
  
                  <!--img do card-->
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="images/gallary/3.png" alt="user bg">
                  </div>
  
                  <div class="card-content">
                    <!--Img do perfil-->
                    <img src="images/avatar/avatar-1.png" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
  
                    <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                      <i class="material-icons">info_outline</i>
                    </a>
  
                    <div class="iconMovel mt-5"> <i class="material-icons">perm_identity</i> <p>'.$usuario['nome'].' '.$usuario['sobrenome'].'</p> </div>
                    <div class="iconMovel"> <i class="material-icons">call</i> <p>'.$usuario['telefone'].'</p> </div>
                    <div class="iconMovel"> <i class="material-icons">email</i> <p>'.$usuario['email'].'</p> </div>
  
                  </div>
  
                  <!--Informações--- depois de click no botão-->
                  <div class="card-reveal">
  
                    <span class="card-title grey-text text-darken-4">'.$usuario['nome'].' '.$usuario['sobrenome'].'
                      <i class="material-icons right">close</i>
                    </span>
  
                    <p>Informações do usuario.</p>
  
                    <div class="iconMovel"> <i class="material-icons">call</i> <p>'.$usuario['telefone'].'</p> </div>
                    <div class="iconMovel"> <i class="material-icons">email</i> <p>'.$usuario['email'].'</p> </div>
                    <div class="iconMovel"> <i class="material-icons">event_available</i> <p>'.$usuario['aniversario'].'</p> </div>
                    <div class="iconMovel"> <i class="material-icons">wc</i> <p>'.$usuario['genero'].'</p></div>
                    <div class="iconMovel"> <i class="material-icons">location_on</i> <p>'.$usuario['nacionalidade'].'</p></div>
  
                    <button type="submit"  class="btn waves-effect waves-light green darken-3 right " id="btn_Interece">Bloquear
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
             <ul class="pagination "  id="paginationCenter">
               <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
               <li class="active"><a href="#!">1</a></li>
               <li class="waves-effect"><a href="#!">2</a></li>
               <li class="waves-effect"><a href="#!">3</a></li>
               <li class="waves-effect"><a href="#!">4</a></li>
               <li class="waves-effect"><a href="#!">5</a></li>
               <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
             </ul>
 
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