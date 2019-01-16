<?php
$mysqli = new mysqli('localhost', 'root', '', 'siccif');
$opcion=$_REQUEST['opcion'];

if($opcion==='cargarCodigoMarca'){
$extraer="SELECT * FROM categoria WHERE idCat=".$_REQUEST['id'];
$ejecutar=mysqli_query($mysqli,$extraer);
while($ejecuta=mysqli_fetch_array($ejecutar))
{
?>    
<input  id="categoriaCodigo" value="<?php  echo $ejecuta['cod'] ?>" />
<?php
}
}
else{
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
}
?>