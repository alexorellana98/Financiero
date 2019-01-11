<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Categorias</title>
  <?php
      include "../Componentes/estilos.php";
  ?>
 <script language="javascript">
 
function envia(){
   window.location="Categoria.php";
  }
</script>
</head>
<?php 
   $aux=$_POST['btnEditar'];
   $sentencia = "SELECT * FROM categoria WHERE idCat=$aux"; 
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
                        <h6 class="panel-title txt-light"><i class="fa fa-edit"></i>  Editar Categoria</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                    
               <form  action="editar.php" method="post" class="form-register" > 
       <div class="input-group">
   
 <div class="col-lg-8 col-md-offset-4">
  <label for="nombCat2" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombCat2" name="nombCat2" placeholder="Nombre" value="<?php echo $fila['nombre'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>

</div>
<div class="col-lg-8 col-md-offset-4">
  <label for="codCat2" >Codigo:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="codCat2" name="codCat2" placeholder="A001" value="<?php echo $fila['cod'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>

</div>
<div class="col-lg-8 col-md-offset-4">
  <label for="valr2" >Valor residual(%):</label>
  <div class="input-group">
  <input type="text" class="form-control" id="valr2" name="valr2" placeholder="Nombre" value="<?php echo $fila['val'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>

</div>
<input  type="hidden" class="form-control" id="idCat" name="idCat" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

</div>
  <div class="row text-center" style="margin-top: 15px;">
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


    
        
