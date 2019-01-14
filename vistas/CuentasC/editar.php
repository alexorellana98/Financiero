<?php 
require 'conexion.php';

//editar Credito
if (!empty($_REQUEST['nombcre']) && !empty($_REQUEST['minip']) && !empty($_REQUEST['inter']) && !empty($_REQUEST['pmax']) && !empty($_REQUEST['maxp']) && !empty($_REQUEST['gara'])){

$ide = $_REQUEST['idCre'];
	$nombe = $_REQUEST['nombcre'];
	$mini = $_REQUEST['minip'];
	$inte = $_REQUEST['inter'];
	$plazo = $_REQUEST['pmax'];
	$maxp = $_REQUEST['maxp'];
	$ga = $_POST['gara'];

$sql = " UPDATE creditos set tipo='$nombe',plazom='$plazo',cmax='$maxp',cmin='$mini',garantia='$ga',interes='$inte' WHERE idCre='$ide'";
	$resultado = $mysqli->query($sql);
header('Location: creditos.php');

}

//editar Cliente
if (!empty($_POST['nomb']) && !empty($_POST['dui']) && !empty($_POST['tel']) && !empty($_POST['Ocup']) && !empty($_POST['dir'])  && !empty($_POST['nit']) && !empty($_POST['depa']) && !empty($_POST['fecha']))  {

$ideC= $_POST['ideC'];
$nombre=$_POST['nomb'];
$ape=$_POST['ape'];
$nit=$_POST['nit'];
$dui=$_POST['dui'];
$tel=$_POST['tel'];
$dep=$_POST['depa'];
$oc=$_POST['Ocup'];
$occ=$_POST['repre'];
$direc=$_POST['dir'];
$tipo=$_POST['tipo'];
$sql ="UPDATE cliente set nombre='$nombre',apellido='$ape',dui='$dui',nit='$nit',repre='$repre',tel='$tel',ocupacion='$oc',depa='$dep',direc='$direc', tipo='$tipo' WHERE idCliente='$ideC'";
$resultado = $mysqli->query($sql);
print '<script language="JavaScript">'; 
print 'alert("Datos correctos");'; 
print '</script>';
header('Location: http://localhost/Financiero/siccif/vistas/CuentasC/RegistroCliente.php');

}

else{
print '<script language="JavaScript">'; 
print 'alert("Datos incorrectos");'; 
print '</script>'; }

?>