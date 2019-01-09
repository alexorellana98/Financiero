<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Categorias</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

 <script language="javascript">
 


function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/Categoria.php";
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
        <!-- Title -->
          <div class="row heading-bg">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h3 align="center" >Editar Categoria</h3>
            </div>
          </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
               <form  action="editar.php" method="post" class="form-register" > 
       <div class="input-group">
   
 <div class="col-lg-8 col-md-offset-3">
  <label for="nombCat2" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombCat2" name="nombCat2" placeholder="Nombre" value="<?php echo $fila['nombre'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>

</div>
<div class="col-lg-8 col-md-offset-3">
  <label for="codCat2" >Codigo:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="codCat2" name="codCat2" placeholder="A001" value="<?php echo $fila['cod'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>

</div>
<div class="col-lg-8 col-md-offset-3">
  <label for="valr2" >Valor residual(%):</label>
  <div class="input-group">
  <input type="text" class="form-control" id="valr2" name="valr2" placeholder="Nombre" value="<?php echo $fila['val'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>

</div>
<input  type="hidden" class="form-control" id="idCat" name="idCat" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

  <div class="col-lg-12 col-md-offset-5">
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


    
        
