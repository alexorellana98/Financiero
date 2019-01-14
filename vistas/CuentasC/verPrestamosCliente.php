<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Ver Prestamos</title>

  <?php
      include "../Componentes/estilos.php";
  ?>
  <script language="javascript">
function enviar(idCliente,idPrestamo){
    document.location.href="amortizar.php?cliente="+idCliente+"&prestamo="+idPrestamo;
}
      
      function ajax_act(id,opcion) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("actualizar").innerHTML = xmlhttp.responseText;    
            // Recarga Tabla con Nuevos Datos
            $('.tablaAct').DataTable();
        }
    }
    xmlhttp.open("post", "../../asset/ajax/cuentasXcobrar.php?id="+id+"&opcion="+opcion, true);
    xmlhttp.send();
}
function cargarModal(id,opcion){
if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("cargarModal").innerHTML = xmlhttp.responseText; 
            //alert(xmlhttp.responseText);
            $('.tablaDetalle').DataTable();
            $("#modalDetallePrestamo").modal('show');
        }
    }
    xmlhttp.open("post", "../..//asset/ajax/modalDetalle.php?id=" +id+"&opcion="+opcion, true);
    xmlhttp.send();
}
      
      
window.onload = function() { 
 ajax_act('<?php echo $_REQUEST['btnPre']; ?>',"Prestamos");
}
</script>
</head>
<?php
if (!empty($_GET['btnalta1']))  {
//activa el activo C:\xampp\htdocs\siccif\vistas\ActivoFijo
$est=1;
$var=$_GET['btnalta1'];
$sql = " UPDATE cliente set estado='$est' WHERE idCliente='$var'";
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
            <div class="panel panel-success card-view" style="margin-top:20px;">
                <div class="panel-heading text-center">
                    <div class="pull-center">
                        <h6 class="panel-title txt-light"><i class="fa fa-usd"></i>  Prestamos del Cliente</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                             <div class="row">
                                  <?php $cont=0;  
$aux2=$_GET['btnPre'];
   $sentencia2 = "SELECT * FROM cliente WHERE idCliente=$aux2";
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
    ?>
<div class="button-group text-left">
<form  action="verDetalleCliente.php" method="get" class="form-register" >
<button type="submit"  class="btn btn-danger" data-dismiss="modal" id="btndetalle" name="btndetalle" value="<?php echo $fila1['idCliente']; ?>" ><i class="fa fa-mail-reply"></i> Atras</button>
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
      
      <div id="cargarModal"></div>
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
