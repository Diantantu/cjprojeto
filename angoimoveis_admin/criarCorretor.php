<?php

if(isset($_GET['cadastrado'])){
  echo '<script>alert("Corrector cadastrado com sucesso")</script>';
}


include('inc/header.php');
?>


      <!-- FIM DO SIDEBAR NAV-->

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
                <h5 class="breadcrumbs-title">Adicionar Corretor</h5>

                <ol class="breadcrumbs">
                  <li> <a href="index.html">Dashboard</a> </li> 
                  <li class="active">Adicionar corretor</li>
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

              <form id="formCriarFormulario" action="autenticaCorretor.php" method="POST">
                <div class="row cor">
     
                  <div class="input-field col s12 m4 l4 mt-3">
                    <div class="input-field col s12">
                      <label for="" class="label">Primeiro nome</label>
                      <input type="text"  class="mt-3 mb-5 tamanhoInput browser-default " required name="firstName">
                    </div>

                    <div class="input-field col s12">
                      <label for="" class="label">Número de telemóvel principal</label>
                      <input type="email" class="mt-3 mb-5 tamanhoInput browser-default " required name="telefone">
                    </div>
                  </div>

                  <div class="input-field col s12 m4 l4 mt-3">
                    <div class="input-field col s12">
                      <label for="" class="label">Último nome</label>
                      <input type="text" class="mt-3 mb-5 tamanhoInput browser-default " required name="lastName">
                    </div>

                    <div class="input-field col s12">
                      <label for="" class="label">Email</label>
                      <input type="email" class="mt-3 mb-5 tamanhoInput browser-default " required name="email">
                    </div>
                    </div>
                    <div class="input-field col s12 m4 l4 mt-3">
                      <div class="input-field col s12">
                        <label for="" class="label">País</label>
                        <input type="text" class="mt-3 mb-5 tamanhoInput browser-default " required name="pais">
                      </div>
                        <div class="input-field col s12">
                          <label for="" class="label">Provincia</label>
                          <input type="text" class="mt-3 mb-5 tamanhoInput browser-default " required name="provincia">
                        </div>
                      
                    </div>
                    <div class="input-field col s12 m4 l4 mt-3">
                    <div class="input-field col s12">
                      <label for="" class="label">Endereço</label>
                      <input type="text" class="mt-3 mb-5 tamanhoInput browser-default " required name="endereco">
                    </div>
        
        


                    <div class="input-field col s12">
                      <label for="" class="label">Data de nascimento</label>
                      <input type="date" max="2003-04-04" class="mt-3 mb-5 tamanhoInput browser-default " required name="dataNascimento">
                    </div>
                    
                  </div>

                   


                    <div class="input-field col s12 sendE mb-5">
                      <button class="btn waves-effect waves-light right green btneviar" onclick="criarCorrector()" id="btn_Interece"  type="submit" name="btnEnviar">Criar conta
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                  
                </div>
              </form>
           
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
     function criarCorrector(){
       document.getElementById('formCriarFormulario').submit();
     }
     </script>
   <script>
    M.AutoInit();
   </script>
</body>

</html>