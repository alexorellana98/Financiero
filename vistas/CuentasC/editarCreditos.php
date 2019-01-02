<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Creditos</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
 


function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/CuentasC/creditos.php";
  }


</script>
</head>
<?php 
   $aux=$_POST['btnEditar'];
   $sentencia = "SELECT * FROM creditos WHERE idCre=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);

   $garanti=$fila['garantia'];
    ?>  
<body>  
  <!--Preloader-->
  <div class="preloader-it">
    <div class="la-anim-1"></div>
  </div>
  <!--/Preloader-->
    <div class="wrapper theme-1-active box-layout pimary-color-red">
  <?php
  include "../Componentes/menu.php";
  ?>  

    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid">
        <!-- Title -->
          <div class="row heading-bg">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h3 align="center" >Editar Credito</h3>
            </div>
          </div>
          <!-- /Title -->
      
                    <?php

                    $cont=0;
                    ?>
                    <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
               <form  action="editar.php" method="post" class="form-register" > 
                <div class="col-md-8 col-md-offset-1">
                  <div class="col-md-6 ">
                    <div class="form-group">
                      <label for="nombcre" >Nombre de Credito:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" readonly="true" id="nombcre" name="nombcre" placeholder="Nombre" value="<?php echo $fila['tipo'];?>">
                        <div class="input-group-addon">
                          <span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="minip" >Mínimo a Prestar:</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="minip" name="minip" placeholder="100" value="<?php echo $fila['cmin'];?>">
                        <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="inter">Interes Anual(%):</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="inter" name="inter" value="<?php echo $fila['interes'];?>">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="pmax" >Plazo Máximo:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="pmax" name="pmax" value="<?php echo $fila['plazom'];?>">
                        <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="maxp">Máximo a Prestar:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="maxp" name="maxp" value="<?php echo $fila['cmax'];?>">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="gara">Tipo de Garantía:</label>
                      <br>
                      <select class="form-control" data-live-search="true" name="gara" id="gara" value="<?php echo $fila['garantia'];?>">
                        <option ></option>
                        <option value="Aval">Aval</option>
                        <option value="Hipotecaria">Hipotecaria</option>
                      </select>  

                    </div>
                  </div>

                
                
                  <input  type="hidden" class="form-control" id="idCre" name="idCre" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

                  <div class="col-lg-12 col-md-offset-4">
                    <br>
                    <br> 
                    <div class="button-group">
                      <button type="submit" class="btn btn-success">Guardar</button>
                      <button type="button"  class="btn btn-success" data-dismiss="modal" onclick="envia()">Cancelar</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>  
          </div>
        </div>
        <!-- /Row -->
                    
       <script>
        window.onload=function(){
          var de=<?php echo json_encode($garanti); ?>;
          document.getElementById('gara').value=de;
        }
      </script>


        
      </div>
    <!-- /#wrapper -->
        <!-- Footer -->
        <footer class="footer container-fluid pl-30 pr-30">
          <div class="row">
            <div class="col-sm-12">
              <p>2017 &copy; Doodle. Pampered by Hencework</p>
            </div>
          </div>
        </footer>
        <!-- /Footer -->
      </div>
    </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
  
  
  <?php
include "../Componentes/scripts.php";
?>
<script src="../dist/js/pages/privilegios.js"></script>
  
</body>

</html>


    
        
