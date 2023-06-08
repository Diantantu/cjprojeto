<?php
include("inc/header.php");

$sql = "SELECT * FROM provincias";
$lista_provincias = DB::pesquisar($sql, []);
?>


    <!-- //////////////////////////////////////////////////////////////////////////// -->

        <!-- Panel do centro -->
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
                  <h5 class="breadcrumbs-title">Resistrar imovel</h5>
  
                  <ol class="breadcrumbs">
                    <li> <a href="index.php">Painel</a> </li>
                    <li class="active">Resistrar Imovel</li>
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

            <div id="basic-form" class="formCentro">
              <div class="row">  
                <ul id="tabs-demo" class="tabs">
                  <li class="tab col s3"><a class="active" href="#test-1">Imovel</a></li>
                </ul>

                <!--SEPARADOR-->
                <div class="divider"></div>
                <div class="divider"></div>

                <!--Formulario de cadastro para um apartamento-->
                <div id="test-1" class="col s12 cor">
                  <form id="formularioregistarimovel" action="handleRegistrarImovel.php" enctype="multipart/form-data" method="POST" class="col s12 mt-1">
                    <div class="col s12 m6 l6">
                      <div class="col s6 m6 l6">
                        <div class="card-panel">
                          <div class="row">
                              <div class="col s12 m12 l12 mb-5 mt-3">
                                  <select name="topologia" class="browser-default  " required>
                                    <option name="topologia" value="" disabled selected>Selecione  a topologia</option>
                                    <option name="topologia" value="6">T-1</option>
                                    <option name="topologia" value="7">T-2</option>
                                    <option name="topologia" value="8">T-3</option>
                                    <option name="topologia" value="9">T-4</option>
                                  </select>
                              </div>
                              <div class="row">
                                <div class="input-field col s12 mb-5">
                                  <i class="material-icons prefix">hotel</i>
                                  <input name="quartos" type="number" required>
                                  <label >Quartos</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s12 mb-5">
                                  <i class="material-icons prefix">local_dining</i>
                                  <input name="cozinhas" type="number" required>
                                  <label >Cozinhas</label>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="col s12 m12 l12">
                          <div class="row">
                            <label for="arquivo" class="btn-file"><i class="material-icons">add_a_photo</i><p> Selecione as imagens do imovel</p></label>
                            <input type="file" name="arquivo"  id="arquivo" multiple required>
                          </div>      
                        </div>
      

                        <div id="dvPreview">
                        </div>
                      </div>
                      <div class="col s6 m6 l6">
                        <div class="card-panel">
                          <div class="row">
                              <div class="row">
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">airline_seat_flat</i>
                                  <input name="suites" type="number" required>
                                  <label for="first_name">Suites</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">weekend</i>
                                  <input name="salas" type="number" required>
                                  <label >Salas</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s12 mb-5">
                                  <i class="material-icons prefix">airline_seat_legroom_normal</i>
                                  <input name="wcs" type="number" required>
                                  <label>Wcs</label>
                                </div>
                              </div>
                          </div>
                        </div>
                        <select name="estado" class="browser-default tipo" required>
                          <option value="" disabled selected>Tipo de Negocio</option>
                          <option value="3">Indisponivel</option>
                          <option value="2">Aluga-se</option>
                        </select>
                      </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="card-panel">
                          <div class="row">
                            <div class="input-field col s12 m12 mb-3">
                              <i class="material-icons prefix">info</i>
                              <input name="descricao" type="text" required>
                              <label >Descrição do imovel</label>
                            </div>
                          </div>
                        </div>
      
                      <div class="col s6 m6 l6">
                        <div class="card-panel">
                          <div class="row">
                            <div class="input-field col s12 m12 mb-3">
                              <!-- <i class="material-icons prefix">location_city</i> -->

                              <select name="provincia" class="" required>
                                    <option name="provincia" value="" disabled selected>Provincia</option>
                                    <?php 

                                      foreach( $lista_provincias as $provincia){

                                        echo '<option name="provincia" value="'.$provincia['idprovincias'].
                                        '">'.$provincia['nome'].'</option>';
                                      }
                                    ?>
                                    
                  
                                  </select>

                          
                            </div>
                            <div class="input-field col s12 m12 mb-3">
                              <i class="material-icons prefix">terrain</i>
                              <input name="municipio" type="text" required>
                              <label >Municipio</label>
                            </div>
                          </div>
                        </div>
                      </div>
      

      
                      <div class="col s6 m6 l6">
                        <div class="card-panel">
                          <div class="row">
                            <div class="input-field col s12 m12 mb-3">
                              <i class="material-icons prefix">nature_people</i>
                              <input name="rua" type="text" required>
                              <label>Rua</label>
                            </div>
                          </div>
                        </div>
                      </div>
      
                      <div class="col s6 m6 l6">
                        <div class="card-panel">
                          <div class="row">
                            <div class="input-field col s12 m12 mb-3">
                              
                              <input name="preco" type="number" max="500000" required>
                              <label>Preço do imovel em kz</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col s6 m6 l6"></div>

                      <div class="col s6 m6 l6">
                        <div class="input-field col s12 m12 l12 ">
                          <button class="btn waves-effect waves-light right green btneviar" id="btn_Interece"  type="submit" name="criarcasa">Cadastrar o imovel
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>
                        
                    </div>
                  </form>  
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
       <script type="text/javascript" src="js/javascriptRegistrarImovel.js"></script>

       <script language="javascript" type="text/javascript">
        $(function () {
            $("#arquivo").change(function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = $("#dvPreview");
                    dvPreview.html("");
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    $($(this)[0].files).each(function () {
                        var file = $(this);
                        if (true) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = $("<img />");
                                img.attr("style", "height:100px;width: 100px");
                                img.attr("src", e.target.result);
                                dvPreview.append(img);
                            }
                            reader.readAsDataURL(file[0]);
                        } else {
                            alert(file[0].name + " is not a valid image file.");
                            dvPreview.html("");
                            return false;
                        }
                    });
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });
        });
    </script>
  </body>
</html>