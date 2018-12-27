
<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Detalle</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/compraNueva2.blade.php";
  }

f
 //funcion para que la tabla se llene dinamicamente
  
    $(document).ready(function () {
   $('#entradafilter').keyup(function () {
      var rex = new RegExp($(this).val(), 'i');
        $('.contenidobusqueda tr').hide();
        $('.contenidobusqueda tr').filter(function () {
            return rex.test($(this).text());
        }).show();

        })

});
</script>
</head>
<?php
if (!empty($_GET['btnalta1']))  {
//activa el activo 
$est=1;
$var=$_GET['btnalta1'];
$sql = " UPDATE categoria set estado='$est' WHERE idCat='$var'";
$resultado = $mysqli->query($sql); 
}
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
              <h3 align="center" >Depreciación de activo fijo</h3>
            </div>
          </div>
          <!-- /Title -->
      
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                          <tr >
                              <th  WIDTH="50" HEIGHT='9' >N°</th>
                              <th >Código</th>
                              <th >Descripción</th>
                              <th >Categoria</th>
                              <th >Subcategoria</th>
                              <th  WIDTH="40" HEIGHT='9'>Opciones</th>
                          </tr>
                        </thead>
                        
                        <tbody >
                            <?php
$extraer="SELECT * FROM activo";

// $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($mysqli,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
  
 if (($ejecuta['estado'])==1) {
  $cont1=$cont1+1;
    ?>  
  <tr>
    <td><?php  echo $cont1 ?> </td>
    <td><?php  echo $ejecuta['codAct'] ?> </td>
    <td><?php echo $ejecuta['descrip']?></td>
<?php
    $aux=$ejecuta['idCat'];
   $sentencia1 = "SELECT * FROM categoria WHERE idCat=$aux"; 
   $ejecutar1=mysqli_query($mysqli,$sentencia1);
   $fila = mysqli_fetch_assoc($ejecutar1);
   
   ?>
    <td><?php echo $fila['nombre'];?></td>
    <?php
    $aux2=$ejecuta['idSub'];
   $sentencia2 = "SELECT * FROM subcategoria WHERE idSub=$aux2"; 
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
   
   ?>
    <td> <?php echo $fila1['nombre'];?></td>
    
    <td>
    <?php


    ?>
   
      <form  action="verActivo.php" method="get" class="form-register" > 
      
<button  type="submit" class="btn btn-danger" id="btnId" name="btnId"  data-toggle="modal"  value=<?php echo $ejecuta['idAc']?>>Ver</button>
</form>

     

     <?php }?>

    </td>
  </tr>

<?php

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


    
        
