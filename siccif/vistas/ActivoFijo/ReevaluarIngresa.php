<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Ingresar reevaluacion</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/Reevaluar.php";
  }


</script>
</head>

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
              <h3 align="center" >Detalles</h3>
            </div>
          </div>
          <!-- /Title -->

                    <?php 
   $aux=$_POST['btnenvia'];
   $sentencia = "SELECT * FROM detalle_Activo WHERE activofijo_id=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
    ?>   
                    <div class="col-lg-12 col-md-offset-11">
                      
                      <div class="button-group">

                      <button type="button"  class="btn btn-success" data-dismiss="modal" onclick="envia()">Atras</button>
                      </div>
                      <br>
                    </div>
                    <!-- Row -->

        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              <form  action="insert.php" method="post" class="form-register" > 
                <div class="input-group">
                  <div class="col-lg-8 col-md-offset-6">
                    <label for="precA" >Precio actual:</label>
                    <div class="input-group">
                      <input readonly="readonly" type="number" class="form-control" id="precA" name="precA" placeholder="Nombre" value="<?php echo $fila['valor_historico'];?>">
                      <div class="input-group-addon">
                        <span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div> 
                  <div class="col-lg-8 col-md-offset-6">
                    <label for="precN" >Nuevo precio:</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="precN" name="precN" placeholder="Nombre" >
                      <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div>

                  <input  type="hidden" class="form-control" id="ideA" name="ideA" placeholder="Nombre" value="<?php echo $_POST['btnenvia'];?>">

                <div class="col-lg-12 col-md-offset-8">
                  <br>
                  <br> 
                  <div class="button-group">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button"  class="btn btn-success" data-dismiss="modal" onclick="envia()">Cancelar</button>
                  </div>
                  <br>
                </div>

              </div>
            </form>
          </div>  
        </div>
      </div>
        <!-- /Row -->
                    
                  

 
        
        <div class="col-md-1"></div>


        
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
  
</body>

</html>


    
        
