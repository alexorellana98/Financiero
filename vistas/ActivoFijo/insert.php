<?php 
require 'conexion.php';
$enviar=1;
//$con=mysqli_connect('localhost','root','','finanzas');
if (!$mysqli) {
  echo "Erick no se esta conectando gommennasai";
}else {echo "Erick se esta conectando desu";
    //echo $_REQUEST['codi'];
}
 /*$base=mysqli_select_db($con,'finanzas');
if (!$base) {
  echo "Erick no se encontro la base gommennasai";
}*/
//inserta proveedor
$est=1;
if (!empty($_POST['nomb']) && !empty($_POST['dir']) && !empty($_POST['nit']) && !empty($_POST['cont']) && !empty($_POST['tel']) && !empty($_POST['correo']))  {

$insertar="INSERT INTO proveedor (nombre, direccion, nit, contacto, telefono, correo, observacion,estado) VALUES ('$_POST[nomb]','$_POST[dir]','$_POST[nit]','$_POST[cont]','$_POST[tel]','$_POST[correo]','$_POST[obs]','$est')";
$ejecutar=mysqli_query($mysqli,$insertar);
if(!$ejecutar)
    $enviar=0;
//echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: gestionRegistros.php?paso=proveedor&tipo=agregar&resultado='.$enviar);

}
//insertar movimiento

if (!empty($_POST['nombMov']))  {
$est=1;
$insertar="INSERT INTO movimiento (nombre,estado) VALUES ('$_POST[nombMov]','$est')";
$ejecutar=mysqli_query($mysqli,$insertar);
if(!$ejecutar)
    $enviar=0;
//echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: gestionRegistros.php?paso=movimiento&tipo=agregar&resultado='.$enviar);

}
//insertar institucion

if (!empty($_POST['nombreIns']))  {
$est=1;
$insertar="INSERT INTO institucion (codigo,Nombre,estado) VALUES ('$_POST[codIns]','$_POST[nombreIns]','$est')";
$ejecutar=mysqli_query($mysqli,$insertar);
if(!$ejecutar)
    $enviar=0;
//echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: gestionRegistros.php?paso=institucion&tipo=agregar&resultado='.$enviar);

}
//insertar marca
if (!empty($_POST['nombProd'])){
$est=1;
$insertar="INSERT INTO marca (nombre,estado) VALUES ('$_POST[nombProd]','$est')";
$ejecutar=mysqli_query($mysqli,$insertar);
if(!$ejecutar)
    $enviar=0;
//echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: gestionRegistros.php?paso=marca&tipo=agregar&resultado='.$enviar);
}
//inserta clasificacion activo
if (!empty($_POST['nomAct']))  {
$est=1;
$insertar="INSERT INTO clasificaactivo (nombre,vida,estado) VALUES ('$_POST[nomAct]','$_POST[vida]','$est')";
$ejecutar=mysqli_query($mysqli,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost/Financiero/siccif/vistas/ActivoFijo/clasificacionActivo.php');
}


//insertar Ubicacion

if (!empty($_POST['nombUb']) && !empty($_POST['codUb']))  {
$est=1;

$insertar="INSERT INTO ubicacion (nombre,estado,codU) VALUES ('$_POST[nombUb]','$est','$_POST[codUb]')";
$ejecutar=mysqli_query($mysqli,$insertar);
if(!$ejecutar)
    $enviar=0;
//echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: gestionRegistros.php?paso=ubicacion&tipo=agregar&resultado='.$enviar);

}

//inserta Categoria
if (!empty($_POST['nombcat']) && !empty($_POST['cod']) )  {
 $val=1;
if($_POST['depreciar']==="on")
    $depreciar=1;
else 
    $depreciar=0;
if($_POST['reevaluar']==="on")
    $reevaluar=1;
else
    $reevaluar=0;
$insertar="INSERT INTO Categoria (nombre,cod,val,vidautil,vidaeco,estado,reevaluar,depreciar,tipo) VALUES ('$_POST[nombcat]','$_POST[cod]','$_POST[val]','$_POST[vidU]','$_POST[vidE]','$val',$reevaluar,$depreciar,'$_POST[tipo]')";
$ejecutar=mysqli_query($mysqli,$insertar);
if(!$ejecutar)
    $enviar=0;
//echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: gestionRegistros.php?paso=categoria&tipo=agregar&resultado='.$enviar);
}

//inserta subCategoria
if (!empty($_POST['nombsub']) && !empty($_POST['nomcatego']) && !empty($_POST['codsub']))  {

 $val=1;
   $aux=$_POST['nomcatego'];
   
   $idc="SELECT idCat FROM Categoria WHERE cod='$aux'";
     
$ejecutar1=mysqli_query($mysqli,$idc);
$fila = mysqli_fetch_assoc($ejecutar1);
$insertar="INSERT INTO subcategoria (nombre,idcat,codigo,estado) VALUES ('$_POST[nombsub]','$fila[idCat]','$_POST[codsub]','$val')";

$ejecutar=mysqli_query($mysqli,$insertar);
if(!$ejecutar)
    $enviar=0;
//echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: gestionRegistros.php?paso=subcategoria&tipo=agregar&resultado='.$enviar);
}


//inserta Activo
if (!empty($_REQUEST['codi']) && !empty($_REQUEST['idcat'])  && !empty($_REQUEST['des']) && !empty($_REQUEST['ubica2']))  {
//echo 'entra a registro de activo';
  $va2=1;
  /*
    $aux=$_REQUEST['sub'];
   $sentencia = "SELECT * FROM subcategoria WHERE codigo='$aux'"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
    */
    $aux2=$_REQUEST['ubica2'];
   $sentencia2 = "SELECT * FROM ubicacion WHERE codU='$aux2'"; 
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila2 = mysqli_fetch_assoc($ejecutar2);
$insertar="INSERT INTO activo (codAct,descrip,idCat,idSub,estado,idUb) VALUES ('$_REQUEST[codi]','$_REQUEST[des]','$_REQUEST[idcat]','','$va2','$fila2[idUb]')";
$ejecutar=mysqli_query($mysqli,$insertar);
}


//inserta Datos de compraIngresar
//DESDE AQUI HA CAMBIADO
if (!empty($_REQUEST['prov']) && !empty($_REQUEST['serie']) && !empty($_REQUEST['fecha']) && !empty($_REQUEST['prec']) && !empty($_REQUEST['condi'])  && !empty($_REQUEST['idac']) )  {
$fe=$_REQUEST['fecha'];
$tfecha=date("Y-m-d",strtotime($fe));//fecha de inicio de uso
ini_set('date.timezone', 'America/El_Salvador');
$Hoy=date("Y/m/d");//fecha de adquisicion
$vidautil=0; 
$est=1;
 $dona="";
  $aux=$_REQUEST['idac'];
  $aux2=$_REQUEST['dona'];
  $aux3=$_REQUEST['condi'];
  if ($aux2==1) {
    $dona="SI"; 
  }else{$dona="NO";}
if ($aux3=="Nuevo"){
  $sentencia2 = "SELECT idCat FROM activo WHERE idAc='$aux'"; 
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila2 = mysqli_fetch_assoc($ejecutar2);
   $sentencia1 = "SELECT vidautil FROM categoria WHERE idCat='$fila2[idCat]'"; 
   $ejecutar1=mysqli_query($mysqli,$sentencia1);
   $fila1 = mysqli_fetch_assoc($ejecutar1);
    $vidautil=$fila1[vidautil];
  }else{
    $vidautil=$_REQUEST['vi'];
  }
////////////////////////
$sentencia = "SELECT count(*) as cuenta FROM activo  order by idAc desc"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
    $fila = mysqli_fetch_assoc($ejecutar);
    if(intval($fila['cuenta'])<=0 || $fila['cuenta']==""){
        $id=1;
    }
    else{
       $sentencia = "SELECT * FROM activo  order by idAc desc"; 
       $ejecutar=mysqli_query($mysqli,$sentencia);
       $fila = mysqli_fetch_assoc($ejecutar);
       $id=$fila['idAc'];
    }
//////////////////////
    
$sentencia5 = "SELECT idUb FROM activo WHERE idAc='$aux'"; 
   $ejecutar5=mysqli_query($mysqli,$sentencia5);
   $fila5 = mysqli_fetch_assoc($ejecutar5);    
    $ubicacion=$fila5['idUb'];
$insertar="INSERT INTO compras (idProv,fecha,condicion,precioUni,codAct,donado,estado) VALUES ('$_REQUEST[prov]','$tfecha','$_REQUEST[condi]','$_REQUEST[prec]','$id','$dona','$est')";
$ejecutar=mysqli_query($mysqli,$insertar);
$va=1;
$sql = " UPDATE activo set estadoBoton='$va' WHERE idAc='$aux'";
$resultado = $mysqli->query($sql);
    

   
//insertar en tabla detalle de activo
$insertar2="INSERT INTO detalle_activo (serie,fecha_adqui,fecha_inicio,valor_historico,donado,vidautil_restante,marca_id,ubi_id,activofijo_id) VALUES ('$_REQUEST[serie]','$Hoy','$tfecha','$_REQUEST[prec]','$dona','$vidautil','$_REQUEST[marca]','$ubicacion','$id')";
$ejecutar3=mysqli_query($mysqli,$insertar2);
header('Location: Comprar.php?condicion='.$aux3);
}

echo $_REQUEST['idAc'].$_REQUEST['condiM'].$_REQUEST['nfac'].$_REQUEST['fech'].$_REQUEST['prec'];
//inserta Venta
if (!empty($_POST['idAc']) && !empty($_POST['condiM']) && !empty($_POST['nfac']) && !empty($_POST['fech']) && !empty($_POST['prec']))  {
 $val=2;
$aux5=$_POST['idAc'];
$insertar="INSERT INTO venta (idActi,idMovi,factNum,fecha,precVenta) VALUES ('$_POST[idAc]','$_POST[condiM]','$_POST[nfac]','$_POST[fech]','$_POST[prec]')";
$ejecutar=mysqli_query($mysqli,$insertar);
$sql = " UPDATE activo set estado='$val' WHERE idAc='$aux5'";
  $resultado = $mysqli->query($sql);
header('Location: http://localhost/Financiero/siccif/vistas/ActivoFijo/factura.php');
}
//inserta Reevaluacion
if (!empty($_POST['ideA']) && !empty($_POST['precN']) && !empty($_POST['precA']))  {
 $val=$_POST['ideA'];
   $aux=$_POST['precN'];
   $sql = " UPDATE detalle_activo set valor_historico='$aux' WHERE activofijo_id='$val'";
  $resultado = $mysqli->query($sql);
  ini_set('date.timezone', 'America/El_Salvador');
$fechaR=date("Y/m/d");//fecha de reevalaucion
$insertar="INSERT INTO reevaluar (fecha,valorAnt,idAc,valor) VALUES ('$fechaR','$_POST[precA]','$_POST[ideA]','$_POST[precN]')";
$ejecutar=mysqli_query($mysqli,$insertar);
if(!$ejecutar)
    $enviar=0;
//echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: administrarActivo.php?accion=reevaluar&tipo=agregar&resultado='.$enviar);
}
//inserta Departamento
/*if (!empty($_POST['nombDe']) && !empty($_POST['codDe']) )  {

 $nomb=$_POST['nombDe'];
   $cod=$_POST['codDe'];
   $aux=1;
   
$insertar="INSERT INTO departamento (nombre,codigo,estado) VALUES ('$nomb','$cod','$aux')";

$ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost/siccif/vistas/ActivoFijo/Departamento.blade.php');
}*/

//HASTA AQUI
?>