
<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Editar Ubicacion</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
    function envia(){
      window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/Ubicacion.php";
    }
  </script>
</head>
<?php 
   $aux=$_POST['btnEditar'];
   $sentencia = "SELECT * FROM Ubicacion WHERE idUb=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
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
              <h3 align="center" >Editar Ubicación</h3>
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
                <div class="input-group">
                   
                 <div class="col-lg-12 col-md-offset-5">
                  <label for="nombeditUb" >Nombre:</label>
                  <div class="input-group">
                  <input type="text" class="form-control" id="nombeditUb" name="nombeditUb" placeholder="Nombre" value="<?php echo $fila['nombre'];?>">
                  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
                </div>



                <div class="input-group">

                  <label for="codUb2" >Codigo:</label>
                  <div class="input-group">
                  <input type="text" class="form-control" id="codUb2" name="codUb2" placeholder="Ej:0023" value="<?php echo $fila['codU'];?>">
                  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
                </div>
                </div>



                </div>
                <input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

                  <div class="col-lg-12 col-md-offset-5">
                <br>
                <br> 
                <div class="button-group">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button"  class="btn btn-success" data-dismiss="modal" onclick="envia()">Cancelar</button>
                </div>
                <br>
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


    
        
