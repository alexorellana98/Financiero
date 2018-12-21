<?php 

require 'conexion.php';

//$con=mysqli_connect('localhost','root','','finanzas');
if (!$mysqli) {
  echo "Erick no se esta conectando gommennasai";

}else {echo "Erick se esta conectando desu"; }

 /*$base=mysqli_select_db($con,'finanzas');
if (!$base) {
  echo "Erick no se encontro la base gommennasai";
}*/

 //inserta pago de cuota

 if (!empty($_REQUEST['monto']) && !empty($_REQUEST['total']))  {
  $saldo= $_REQUEST['saldo'];
  $tipo= $_REQUEST['tipo'];
  $numero=$_REQUEST['numero'];
  $fechapa=$_REQUEST['fe'];
  $atraso=$_REQUEST['atraso'];
  $mora=$_REQUEST['mora'];
  $total=$_REQUEST['total'];
  $idPre= $_REQUEST['pres'];
  $cuota=$_REQUEST['cuota'];

  $insertar="INSERT INTO pagos (saldo,tipo,numero,fechapago,atraso,mora,total,idPres,cuota) VALUES ('$saldo','$tipo','$numero','$_REQUEST[fe]','$atraso','$mora','$total','$idPre','$cuota')";
  $ejecutar=mysqli_query($mysqli,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost/Financiero/siccif/vistas/CuentasC/RegistroCliente.blade.php');
}else{
print '<script language="JavaScript">'; 
print 'alert("Datos incorrectos");'; 
print '</script>';
 }
//HASTA AQUI
?>