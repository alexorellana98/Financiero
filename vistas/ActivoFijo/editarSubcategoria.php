<?php
require 'conexion.php';
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
   window.location="subcategoria.php";
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
            <div class="panel panel-warning card-view" style="margin-top:20px;">
                <div class="panel-heading text-center">
                    <div class="pull-center">
                        <h6 class="panel-title txt-light"><i class="fa fa-edit"></i>  Editar Sub-Categoria</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                    <?php              $cont=0;              ?>
                    
                  
               <form  action="editar.php" method="post" class="form-register" > 
               <div class="row">  
               <div class="col-lg-12 col-md-offset-3">
            <div class="input-group" style="width: 40%;">
                <label for="nombsub2" >Nombre:</label>
                <div class="input-group">
                <input type="text" class="form-control" id="nombsub2" name="nombsub2" placeholder="Nombre" value="<?php echo $fila['nombre'];?>">
                <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
              </div>
              </div>
              <div class="input-group" style="width: 40%;">
                 <label for="nomsubcatego" >Elija una categoria:</label>
              <br>
               <select class="form-control SCategoria" data-live-search="true" id=" nomsubcatego" name="nomsubcatego">
               <option></option>
                                   <?php
              $extraer="SELECT * FROM categoria";
              $ejecutar=mysqli_query($mysqli,$extraer);
              $cont=$cont+1;
              while($ejecuta=mysqli_fetch_array($ejecutar))
              {$cont=$cont+1
                  ?>     <option value="<?php  echo $ejecuta['idCat'] ?>"><?php  echo $ejecuta['nombre'] ?></option>                 <?php
              }    ?>                   
                   
              </select>                 
              </div>
              <div class="input-group" style="width: 40%; margin-top:15px;">
                <label for="codsub2" >Código:</label>
                <div class="input-group">
                <input type="text" class="form-control" id="codsub2" name="codsub2" placeholder="Ejemplo : 0001" value="<?php echo $fila['codigo'];?>">
                <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
              </div>
              </div>
               </div>
                </div>
              <input  type="hidden" class="form-control" id="idsu" name="idsu" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

                
             <br>
             <br>
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
 <script>
        $(function () {
            $('.SCategoria').select2()
        });
    </script> 
</body>

</html>


    
        
