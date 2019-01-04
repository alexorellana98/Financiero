<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
 <title>Editar Subcategoria</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
 


function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/subcategoria.php";
  }


</script>
</head>
<?php 
   $aux=$_POST['btnEditar'];
   $sentencia = "SELECT * FROM subcategoria WHERE idSub=$aux"; 
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
              <h3 align="center" >Editar Subcategoria</h3>
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
                 
               <div class="col-lg-8 col-md-offset-3">
                <label for="nombsub2" >Nombre:</label>
                <div class="input-group">
                <input type="text" class="form-control" id="nombsub2" name="nombsub2" placeholder="Nombre" value="<?php echo $fila['nombre'];?>">
                <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
              </div>

              </div>
              <div class="col-lg-8 col-md-offset-3">
                 <label for="nomsubcatego" >Elija una categoria:</label>
              <br>
               <select class="form-control SCategoria" data-live-search="true" id=" nomsubcatego" name="nomsubcatego" style="padding-bottom: 25px;">
               <option></option>

                                   <?php
              $extraer="SELECT * FROM categoria";

               //$base=mysqli_select_db($con,'finanzas');
              $ejecutar=mysqli_query($mysqli,$extraer);
              $cont=$cont+1;

              while($ejecuta=mysqli_fetch_array($ejecutar))
              {$cont=$cont+1;
                

                  ?>  
                               <option value="<?php  echo $ejecuta['idCat'] ?>"><?php  echo $ejecuta['nombre'] ?></option>
                 
                                 
                                    
                  <?php
              }
              ?>                   
                   
              </select>                 

              </div>
              <div class="col-lg-8 col-md-offset-3" style="padding-top:20px;">
                <label for="codsub2" >Código:</label>
                <div class="input-group">
                <input type="text" class="form-control" id="codsub2" name="codsub2" placeholder="Ejemplo : 0001" value="<?php echo $fila['codigo'];?>">
                <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
              </div>
              </div>

              
              <input  type="hidden" class="form-control" id="idsu" name="idsu" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

                <div class="col-lg-12 col-md-offset-5">
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
 <script>
        $(function () {
            $('.SCategoria').select2()
        });
    </script> 
</body>

</html>


    
        
