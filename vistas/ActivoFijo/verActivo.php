<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>ver activo</title>
  <?php
      include "../Componentes/estilos.php";
  ?>
  <script language="javascript">
    function envia(){
       window.location="administrarActivo.php?accion=depreciar";
      }

    function envia1(){
       window.location="depreciar.php";
      }
      
      function actualizar(id){
     if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("actualizar").innerHTML = xmlhttp.responseText;
                    //alert(xmlhttp.responseText);
                    $('.tablaAct').DataTable();
                }
            }
            xmlhttp.open("post", "../..//asset/ajax/activoFijo.php?id=" +id+"&opcion=verActivoDepreciar", true);
            xmlhttp.send();
}
window.onload = function() { 
   actualizar('<?php echo $_REQUEST['btnId']; ?>');
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
            <div class="panel panel-info card-view" style="margin-top: 20px;">
            <div class="panel-heading text-center">
                <div class="pull-center">
                    <h3 class="panel-title txt-light"><i class="fa fa-info-circle"></i>   Detalle de Activo Fijo</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <?php
                          $aux2=$_GET['btnId'];
                         $sentencia2 = "SELECT * FROM detalle_activo WHERE activofijo_id='$aux2'"; 
                         $ejecutar2=mysqli_query($mysqli,$sentencia2);
                         $fila1 = mysqli_fetch_assoc($ejecutar2);
                         
                         $senten2 = "SELECT idCat FROM activo WHERE idAc='$aux2'"; 
                         $ejecu2=mysqli_query($mysqli,$senten2);
                         $fil2 = mysqli_fetch_assoc($ejecu2);
                         $senten1 = "SELECT * FROM categoria WHERE idCat='$fil2[idCat]'"; 
                         $ejecu1=mysqli_query($mysqli,$senten1);
                         $fil1 = mysqli_fetch_assoc($ejecu1);

                         $precio=$fila1['valor_historico'];
                         $res=$fil1['val'];
                         $residual=$precio*($res/100);
                         $dep=$precio-$residual;
                         ?>
                <div class="row">
                   <div class="col-md-10" style="margin-left:0px; padding-left:0px;">
                       <div class="button-group">
                    <button type="submit"  class="btn btn-danger" onclick="envia()"><i class="fa fa-mail-reply"></i>  Atras</button>
                    </div>
                   </div>
                   <div class="col-md-2">
                       <form  action="depreciar.php" method="get" class="form-register" > 
                          <button type="submit"  class="btn btn-success" id="boton" name="boton" onclick="envia1()" value="<?php echo $aux2; ?>"><i class="glyphicon glyphicon-eye-open"></i> Ver Depreciacion</button>
                          </form>
                   </div>    
                </div>
               
                  <div class="table-wrap">
                    <div class="table-responsive" id="actualizar">
                    </div>
                  </div>
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


    
        
