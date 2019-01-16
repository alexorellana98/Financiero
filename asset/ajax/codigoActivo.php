<?php
$mysqli = new mysqli('localhost', 'root', '', 'siccif');
$opcion=$_REQUEST['opcion'];
if($opcion=="codigoActivo"){
$intitucion=$_REQUEST['institucion'];
$ubicacion=$_REQUEST["ubicacion"];
$categoria=$_REQUEST['categoria'];
$activo=$_REQUEST['activo'];
$codigo=$intitucion.'-'.$ubicacion.'-'.$categoria;
$acortado=substr($codigo,0,16);
//echo $acortado;
$cuenta=0;
$sentencia = "SELECT substring(codAct,1,16) as codigo FROM activo";
$ejecutar=mysqli_query($mysqli,$sentencia);
//echo $sentencia;
while($fila = mysqli_fetch_array($ejecutar)){
    if($fila['codigo']===$acortado)
        $cuenta++;
}
//echo $cuenta;
if($cuenta==0)
    $restante="-0001";
else if($cuenta<10)
    $restante="-000".($cuenta+1);
else if($cuenta<100)
    $restante="-00".($cuenta+1);
else if($cuenta<1000)
    $restante="-0".($cuenta+1);

   echo $codigo.''.$restante;
}
?>