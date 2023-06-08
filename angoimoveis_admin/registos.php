<?php
include('inc/header.php');

$sqlimoveispublicados = 'SELECT imovel.*, provincias.nome as cidade, disponibilidade.nome as disponibil FROM imovel inner join provincias on imovel.provincia=provincias.idprovincias inner join disponibilidade on
imovel.disponibilidade=disponibilidade.id WHERE disponibilidade=2';

$sqlimoveisalugados = 'SELECT imovel.*, provincias.nome as cidade, disponibilidade.nome as disponibil FROM imovel inner join provincias on imovel.provincia=provincias.idprovincias inner join disponibilidade on
imovel.disponibilidade=disponibilidade.id WHERE disponibilidade=1';

$resultadoImoveis = DB::pesquisar($sqlimoveispublicados,[]);

$resultadoimoveisAlugados = DB::pesquisar($sqlimoveisalugados,[]);

$nome_corretor = $_SESSION['nome_corrector'].' '.$_SESSION['sobrenome_corrector'];




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
                <h5 class="breadcrumbs-title">Registos</h5>

                <ol class="breadcrumbs">
                  <li> <a href="index.php">Painel</a> </li>
                  <li class="active">Registos</li>
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
            <li class="tab col s3"><a href="#test-2">Arrendados</a></li>
           
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
                            
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                                <th>Provincia</th>
                                <th>Muniicipio</th>
                                <th>Bairro</th>
                                <th>Corretor</th>
                                <th>Preço</th>
                                <th>Estado</th>
                                <th>Data</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                              
                            </tr>
                        </thead>
                        <tbody>

                                  
                      <?php
                        $counter = 0;
                        foreach($resultadoImoveis as $imovel) {
                            $counter++;

                            
                          echo'
                        <tr>
                            <td scope="row">'.$counter.'</td>
                            <td>'.substr($imovel['descricao'], 0, 30).'</td>
                            <td>'.$imovel['cidade'].'</td>
                            <td>'.$imovel['municipio'].'</td>
                            <td>'.$imovel['bairro'].'</td>
                            <td>'.$nome_corretor.'</td>
                            <td>'.number_format($imovel['preco'], 2, ",", ".").'</td>
                            <td>'.$imovel['disponibil'].'</td>
                            <td>'.$imovel['data_registo'].'</td>
                            <td>'.substr($imovel['lat'], 0, 10).'</td>
                            <td>'.substr($imovel['lg'], 0, 10).'</td>
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
        

          <!--Arrendados-->
          <div id="test-2" class="col s12">
            <div class="container">
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="row">

                   
                  <table class="table" id="tableArrendados">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                                <th>Provincia</th>
                                <th>Municipio</th>
                                <th>Bairro</th>
                                <th>Corretor</th>
                                <th>Preço</th>
                                <th>Estado</th>
                                <th>Data</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                              
                            </tr>
                        </thead>
                        <tbody>

                                  
                      <?php
                        $counter = 0;
                        foreach($resultadoimoveisAlugados as $imovel) {
                            $counter++;

                            
                          echo'
                        <tr>
                            <td scope="row">'.$counter.'</td>
                            <td>'.substr($imovel['descricao'], 0, 30).'</td>
                            <td>'.$imovel['cidade'].'</td>
                            <td>'.$imovel['municipio'].'</td>
                            <td>'.$imovel['bairro'].'</td>
                            <td>'.$nome_corretor.'</td>
                            <td>'.number_format($imovel['preco'], 2, ",", ".").'</td>
                            <td>'.$imovel['disponibil'].'</td>
                            <td>'.$imovel['data_registo'].'</td>
                            <td>'.substr($imovel['lat'], 0, 10).'</td>
                            <td>'.substr($imovel['lg'], 0, 10).'</td>
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

        <script type="text/javascript" src="js/pdfmake.min.js"></script>
        <script type="text/javascript" src="js/vfs_fonts.js"></script>
        <script type="text/javascript" src="js/datatables.min.js"></script>
         <script>

$(document).ready(function(){
  $('#myTable').dataTable({
    dom: 'Bfrtip',
    buttons: [
      {
        extend : 'pdfHtml5',
                title : function() {
                    return "Imoveis Disponiveis";
                },
                
                pageSize : 'LEGAL',
                text : '<i class="fa fa-file-pdf-o"> PDF</i>',
                titleAttr : 'PDF'

      },
      'copiar', 'csv', 'excel', 'pdf', 'print'
    ]
  });
});

$(document).ready(function(){
  $('#tableArrendados').dataTable({
    dom: 'Bfrtip',
    buttons: [
      {
        extend : 'pdfHtml5',
                title : function() {
                    return "Imoveis Arrendados";
                },
                
                pageSize : 'LEGAL',
                text : '<i class="fa fa-file-pdf-o"> PDF</i>',
                titleAttr : 'PDF'

      },
      'copiar', 'csv', 'excel', 'pdf', 'print'
    ]
  });
});

 </script>

</body>

</html>