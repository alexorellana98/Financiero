<?php
$mysqli = new mysqli('localhost', 'root', '', 'siccif');
$opcion=$_REQUEST['id'];
$extraer="SELECT * FROM subcategoria WHERE idcat=".$opcion;
$ejecutar=mysqli_query($mysqli,$extraer);
while($ejecuta=mysqli_fetch_array($ejecutar))
{
if (($ejecuta['estado'])==1) {
?>    
<option  id="ide2" value="<?php  echo $ejecuta['codigo'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>
<?php
}
}
?>