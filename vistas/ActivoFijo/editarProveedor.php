<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Editar Proveedor</title>
  <?php
      include "../Componentes/estilos.php";
  ?>
  <script language="javascript">
function envia(){
   window.location="RegistroProveedor.php";
  }
</script>
</head>
<?php 
   $aux=$_POST['btnEditar'];
   $sentencia = "SELECT * FROM proveedor WHERE ide=$aux"; 
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
            <div class="panel panel-warning card-view" style="margin-top:20px;">
                <div class="panel-heading text-center">
                    <div class="pull-center">
                        <h6 class="panel-title txt-light"><i class="fa fa-edit"></i>  Editar Proveedor</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                    <form  action="editar.php" method="post" class="form-register" > 
 <div class="col-lg-12 col-md-offset-2" style="margin-bottom: 15px;">
<div class="col-md-6">
<div class="input-group">

  <label for="nomb" >Nombre de proveedor:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nomb2" placeholder="Nombre" name="nomb2" value="<?php echo $fila['nombre'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<br>

<div class="input-group">
  <label for="dir">Dirección </label>
  <div class="input-group">
  <input type="text" class="form-control" id="dir2" name="dir2" value="<?php echo $fila['direccion'];?>">
  <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
  </div>
</div>
 
 <br>
<div class="input-group">

  <label for="nit">NIT  </label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit2" placeholder="" name="nit2" value="<?php echo $fila['nit'];?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>

<br>

<div class="input-group">

  <label for="obs">Observaciones </label>
  <div class="input-group">
  <input type="text" class="form-control" id="obs2" placeholder="" name="obs2" value="<?php echo $fila['observacion'];?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></div>
  </div>
</div>

</div>

<div class="col-md-6">


<div class="input-group">

  <label for="cont" >Nombre del contacto:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="cont2" placeholder="Nombre" name="cont2" value="<?php echo $fila['contacto'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>

<br>

<div class="input-group">

  <label for="tel" >Telefono:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="tel2" placeholder="" name="tel2" value="<?php echo $fila['telefono'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>

<br>

<div class="input-group">
  <label for="correo">Correo electrónico </label>
  <div class="input-group">
  <input type="text" class="form-control" id="correo2" name="correo2" value="<?php echo $fila['correo'];?>">
  <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
  </div>
</div>
</div>
<input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>"> 
</div>
                   
                   <div class="row text-center">
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


    
        
