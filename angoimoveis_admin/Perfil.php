<?php
include('inc/header.php');

?>
        <!-- //////////////////////////////////////////////////////////////////////////// -->

        <!-- START CONTENT -->
        <section id="content">
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Pesquisar">
            </div>
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">Perfil</h5>
                  <ol class="breadcrumbs">
                    <li><a href="index.php">Painel</a></li>
                    <li class="active">Perfil</li>
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
                   <li class="tab col s3"><a class="active" href="#test-1">Meus dados</a></li>
                   <li class="tab col s3"><a href="#test-2">Configurações</a></li>
                   <li class="tab col s3"><a href="#test-3">Editar perfil</a></li>
                 </ul>
     
                 <!--SEPARADOR-->
                 <div class="divider"></div>
                 <div class="divider"></div>
                 
                 <!--Meus dados-->
                 <div id="test-1" class="col s12 cor">
                   <div class="container">
     
                     <div class="row">
                       <div class="col s12 m12">
                         <div class="perfil mb-1">
                           <div class="row">
     
                               <div class="col m-4 mt-4 user_perfil">
                                   <img src="images/avataradmin.png" alt="">
                               </div>
     
                               <div class="col m8 mFoto">
                                   <h4><?php echo $_SESSION['nome_admin'].' '.$_SESSION['sobrenome_admin'];?></h4>
                                   <div class="mt--15"> Administrador</div>
                               </div>
     
                           </div>
                         </div>
                       </div>
                     </div>

                     <!-- // -->
            <!-- //////////// -->
                     <div class="row">
                       <div class="col s6 m4 ">
     
                         <div class="mt-4">
                           <span>Primeiro Nome</span> <br>
                           <h4 class="negrito"><?php echo $_SESSION['nome_admin'];?></h4> 
                         </div>
                         <div class="mt-4">
                              <span>Número do telemóvel principal</span> <br>
                              <h4 class="negrito"><?php echo $_SESSION['telemovel_admin'];?></h4>
                          </div>   
     
                         <!-- <div class="mt-4">
                           <span>Sexo</span> <br>
                           <h4 class="negrito">Nada</h4>
                         </div> -->
                         
                       </div>
     
                       <div class="col s6 m4 ">
                          <div class="mt-4">
                             <span >Ultimo Nome</span> <br>
                             <h4 class="negrito"><?php echo $_SESSION['sobrenome_admin'];?></h4>
                          </div>
     
                         <div class="mt-4">
                             <span>Email</span> <br>
                             <h4 class="negrito"><?php echo $_SESSION['email_admin'];?></h4>
                         </div>
     
                         
                        </div>
                        <div class="col s6 m4 mb-5">
                          
                          

                         <!--      
                         
                         <div class="mt-4">
                             <span>País</span> <br>
                             <h4 class="negrito">nada</h4>
                         </div>
     
                         <div class="mt-4 ">
                           <span>Provincia</span> <br>
                           <h4 class="negrito">nada</h4>
                        </div>
     
                         <div class="mt-4">
                             <span>Endereço</span> <br>
                             <h4 class="negrito">nada</h4>
                         </div>
     
                        -->
                      </div>
                     </div>
                   </div>
                 </div>
     
                 <!--configurações-->
                 <div id="test-2" class="col s12 cor">
                   <div class="container">
                     <div class="row">
                       <div class="col s12 m4 mt-5">
                         <a href="#modal" class=" modal-trigger negrito" >
                           <h3>Mudar a foto</h3>
                         </a>
     
                              <!-- Modal Structure -->
                              <div id="modal" class="modal">
                               <div class="modal-content">
                                 <h4>Modal Header</h4>
                                 <p>A bunch of text</p>
                               </div>
                               <div class="modal-footer">
                                 <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                               </div>
                             </div>
         
                         <a href="#modalSenha" class=" modal-trigger negrito">
                           <h3>Mudar a senha</h3>
                         </a>
     
                          <!-- Modal Structure -->
                          <div id="modalSenha" class="modal">
                           <div class="modal-content">
                             <h3 class="alterSenha">Altera a senha</h3>
                             <div class="container">
                               <div class="row">
     
                                 <div class="input-field col s12 m6 l6">
                                   <div class="input-field col s12">
                                     <label for="" class="label">Digite a nova senha</label>
                                     <input type="password" value="" class="mt-3 mb-5 tamanhoInput browser-default ">
                                   </div>
                                 </div>
     
                                 <div class="input-field col s12 m6 l6">
                                   <div class="input-field col s12">
                                     <label for="" class="label">Confirma a senha</label>
                                     <input type="password" value="" class="mt-3 mb-5 tamanhoInput browser-default ">
                                   </div>
                                 </div>
     
                               </div>
     
                             </div>
                           </div>
     
                           <div class="modal-footer">
                             <div class="container">
                               <div class="row">
     
                                 <div class="col 12 m6"></div>
     
                                 <div class="col s12 m6">
                                   <div class="col s12  m6 l6">
                                     <a href="#!" class="modal-close waves-effect red btn-flat btnClose" id="btn_Interece">sair</a>
                                   </div>
                                   
                                   <div class="col s12  m6 l6">
                                     <button class="btn waves-effect  green btnSalvar" id="btn_Interece"  type="submit" name="action">Salvar alterações
                                       <i class="material-icons right">send</i>
                                     </button>
                                   </div>
                                 </div>
                                
                               </div>
                             </div>
                           </div>
                         </div>
     
                         <a href="#" class="negrito">
                           <h3>Terminar sessão</h3>
                         </a>
                       </div>
     
                     </div>
                   </div>
                 </div>
     
                 <!--Editar o perfil-->
                 <div id="test-3" class="col s12 cor">
                     <div class="container">
                       <form action="actualizarperfiladmin.php" method="POST">
     
                         <div class="row">
                           <div class="col s12 m12">
                             <div class="perfilAp mb-1">
                               <div class="row">
         
                                   <div class="col m-4 mt-4 user_perfilAp">
                                       <img src="images/avataradmin.png" alt="">
                                   </div>
     
                                 
         
                                   <div class="col m8 mFoto2">
                                       <h4><?php echo $_SESSION['nome_admin'].' '.$_SESSION['sobrenome_admin'];?></h4>
                                       <div class="mt--15"> Admininistrador</div>
                                   </div>
         
                               </div>
                             </div>
                           </div>
                         </div>
     
                         <div class="row">
                       
                           <div class="input-field col s12 m4 l4">
                             <div class="input-field col s12">
                               <label for="" class="label">Primeiro nome</label>
                               <input type="text" name="nome" value="<?php echo $_SESSION['nome_admin'];?>" class="mt-3 mb-5 tamanhoInput browser-default ">
                             </div>
     
                             <div class="input-field col s12">
                               <label for="" class="label">Email</label>
                               <input type="email" name="email" value="<?php echo $_SESSION['email_admin'];?>" class="mt-3 mb-5 tamanhoInput browser-default ">
                             </div>
     
                             <!-- <div class="input-field col s12">
                               <label for="" class="label">País</label>
                               <input type="text" value="Angola" class="mt-3 mb-5 tamanhoInput browser-default ">
                             </div> -->
                           </div>
     
                           <div class="input-field col s12 m4 l4">
                               <div class="input-field col s12">
                                 <label for="" class="label">Último nome</label>
                                 <input type="text" name="sobrenome" value="<?php echo $_SESSION['sobrenome_admin'];?>" class="mt-3 mb-5 tamanhoInput browser-default ">
                               </div>
     
                               <div class="input-field col s12">
                                 <label for="" class="label">Número de telemóvel principal</label>
                                 <input type="text" name="telefone" value="<?php echo $_SESSION['telemovel_admin'];?>" class="mt-3 mb-5 tamanhoInput browser-default ">
                               </div>
<!--      
                               <div class="input-field col s12">
                                 <label for="" class="label">Provincia</label>
                                 <input type="text" value="Luanda-Angola" class="mt-3 mb-5 tamanhoInput browser-default ">
                               </div>
                              -->
                            </div>
     
                           <!-- <div class="input-field col s12 m4 l4">
                             <div class="input-field col s12">
                               <label for="" class="label">Data de nascimento</label>
                               <input type="date" value="" class="mt-3 mb-5 tamanhoInput browser-default ">
                             </div>
      -->
                             <!-- <div class="input-field col s12">
                               <label for="" class="label">Sexo</label>
                               <input type="text" value="Masculino" class="mt-3 mb-5 tamanhoInput browser-default ">
                             </div>
     
                             <div class="input-field col s12">
                               <label for="" class="label">Endereço</label>
                               <input type="text" value="Cazenga-Rua 1 de junho" class="mt-3 mb-5 tamanhoInput browser-default ">
                             </div>
      -->
                               <div class="input-field col s12 sendE">
                                 <button class="btn waves-effect waves-light right green btneviar" id="btn_Interece"  type="submit" name="action">Salvar alterações
                                   <i class="material-icons right">send</i>
                                 </button>
                               </div>
                           </div>
     
                         </div>
     
                       </form>      
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


     <script src="js/sweetalert.min.js"></script>
       <script>
        <?php
        if($_SESSION['action'] == 13){
          echo 'swal("Dados actualizados!", "Dados actualizados com sucesso!", "success")';
          $_SESSION['action'] = 0;
       }
        ?>
       </script>
      M.AutoInit();
   </script>

  </body>
</html>