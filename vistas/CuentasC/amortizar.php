<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>Amortizar</title>
<?php
include "../Componentes/estilos.php";
?>

<script language="javascript">
function ajax_act(cliente,prestamo,opcion) {
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
xmlhttp.open("post", "../../asset/ajax/cuentasXcobrar.php?cliente="+cliente+"&prestamo="+prestamo+"&opcion="+opcion, true);
xmlhttp.send();
}

window.onload = function() { 
ajax_act('<?php echo $_REQUEST['cliente']; ?>','<?php echo $_REQUEST['prestamo']; ?>',"amortizar");
}
</script>
</head>
<?php
//activa el activo
/*
$aux=$_GET['btnbaja'];
$cadena = explode(" ", $aux);
$aux = $cadena[0];
$idPre = $cadena[1];
$aux7=$cadena[0];
$sentencia = "SELECT * FROM prestamo WHERE idCli='$aux' AND idPres = '$idPre'";
*/
$aux=$_GET['prestamo'];
$aux7=$_GET['cliente'];
$sentencia = "SELECT * FROM prestamo WHERE idPres='$aux'"; 
$ejecutar=mysqli_query($mysqli,$sentencia);
$fila = mysqli_fetch_assoc($ejecutar);
$sentencia1 = "SELECT * FROM cliente WHERE idCliente='$aux7'";
$ejecutar1=mysqli_query($mysqli,$sentencia1);
$fila1 = mysqli_fetch_assoc($ejecutar1);
$sentencia2 = "SELECT * FROM creditos WHERE idCre='$fila[idCre]'";
$ejecutar2=mysqli_query($mysqli,$sentencia2);
$fila2 = mysqli_fetch_assoc($ejecutar2);
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
<div class="panel panel-primary card-view" style="margin-top: 20px;">
<div class="panel-heading text-center">
<div class="pull-center">
<h3 class="panel-title txt-light"><i class="fa fa-usd"></i>   Amortización de Prestamo</h3>
<h3 class="panel-title txt-light">Cliente: <?php echo $fila1['nombre']." ".$fila1['apellido'] ?></h3>
<h3 class="panel-title txt-light">Tipo de Prestamo: <?php echo $fila2['tipo']?></h3>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row">
<form  action="verPrestamosCliente.php" method="get" class="form-register" >
<button type="submit"  class="btn btn-danger" data-dismiss="modal" id="btnPre" name="btnPre" value="<?php echo $aux7; ?>"> <i class="fa fa-mail-reply"> </i>  Atras</button>
</form>
</div>
<?php $cont=0;   ?>

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
