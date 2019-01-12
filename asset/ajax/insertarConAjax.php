<?php
$mysqli = new mysqli('localhost', 'root', '', 'siccif');
$guardo=1;

//inserta Activo
if (!empty($_POST['codi']) && !empty($_POST['idcat']) && !empty($_POST['sub']) && !empty($_POST['des']) && !empty($_POST['ubica2']))  {
  $va2=1;
  $aux=$_POST['sub'];
   $sentencia = "SELECT * FROM subcategoria WHERE codigo='$aux'"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
    $aux2=$_POST['ubica2'];
   $sentencia2 = "SELECT * FROM ubicacion WHERE codU='$aux2'"; 
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila2 = mysqli_fetch_assoc($ejecutar2);
$insertar="INSERT INTO activo (codAct,descrip,idCat,idSub,estado,idUb) VALUES ('$_POST[codi]','$_POST[des]','$_POST[idcat]','$fila[idSub]','$va2','$fila2[idUb]')";
$ejecutar=mysqli_query($mysqli,$insertar);
if(!$ejecutar)
    $guardo=0;
header('Location: Comprar.php?guardo='.$guardo);
}

?>