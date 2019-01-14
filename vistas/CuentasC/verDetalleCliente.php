<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>Detalles</title>
<meta name="author" content="hencework"/>
<?php
include "../Componentes/estilos.php";
?>

<?php
include "../Componentes/scripts.php";
?>
<script language="javascript">
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
    
function envia(){
window.location="RegistroCliente.php";
}

window.onload = function() { 
ajax_act('<?php echo $_REQUEST['btndetalle']; ?>',"DetalleCliente");
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
<h3 class="panel-title txt-light"><i class="fa fa-info-circle"></i>   Detalles</h3>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row">
<div class="col-md-10" style="margin-left:0px; padding-left:0px;">
<div class="button-group">
<button type="submit"  class="btn btn-danger" onclick="envia()"><i class="fa fa-mail-reply"></i>  Atras</button>
</div>
</div>
<div class="col-md-2" style="margin-rigth:20px; padding-rigth:20px;">
<form  action="verPrestamosCliente.php" method="get" class="form-register" > 

<div class="button-group" >
<button type="submit"  class="btn btn-success" id="btnPre" name="btnPre" onclick="envia1()" value="<?php echo $_GET['btndetalle']; ?>"><i class="glyphicon glyphicon-usd"></i> Ver Prestamos</button>
</div>
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

<!-- /#wrapper -->

</body>

</html>




