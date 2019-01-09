<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Reevaluación</title>
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
function envia(){
   window.location="Reevaluar.php";
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
            <div class="panel panel-primary card-view" style="margin-top: 20px;">
            <div class="panel-heading text-center">
                <div class="pull-center">
                    <h3 class="panel-title txt-light"><i class="fa fa-usd"></i>   Reevaluar Activo Fijo</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                 <?php 
   $aux=$_POST['btnenvia'];
   $sentencia = "SELECT * FROM detalle_Activo WHERE activofijo_id=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
    ?>    
              <form  action="insert.php" method="post" class="form-register" > 
               <div class="row">
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
                      <input type="number" class="form-control" id="precN" name="precN" placeholder="Precio" required >
                      <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div>

                  <input  type="hidden" class="form-control" id="ideA" name="ideA" placeholder="Nombre" value="<?php echo $_POST['btnenvia'];?>">

                

              </div>
              </div>
                <div class="row text-center" style="margin-top: 20px;">
                 <?php include '../Componentes/BtnGuardarCancelar.php'; ?>
                </div>
            </form>
                </div>
                </div>
                </div>  
      </div>
    <!-- /#wrapper -->
        <!-- Footer -->
        <?php include '../Componentes/footer.php'; ?>
        <!-- /Footer -->
      </div>
    </div>
        <!-- /Main Content -->
  
  
  <?php
include "../Componentes/scripts.php";
?>
  
</body>

</html>


    
        
