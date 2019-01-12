<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Nuevo Activo</title>
  
  <?php      include "../Componentes/estilos.php";  ?>
  <script language="javascript">

function envia(){
   window.location="Comprar.php";
  }
      
function enviacod(){
  var v2= $("#codigo").val();
$('#codi').val(v2);
}
  function recibe()
  {
  var dep= $("#dep1").val();
  var ins= $("#idIns").val();
  var act= $("#idActivo").val();
  var sub= $("#sub").val();
  var ub= $("#ubica").val();
if (dep=="" || sub=="" || ub=="") {

 alert("Ingrese todos los datos");
}
else{
$('#codigo').val(ins+"-"+ub+"-"+sub+"-"+"00"+act);
var v1= $("#cat ").val();
$('#idcat').val(v1);
 $('#ubica2').val(ub);
$('#codi').val(ins+"-"+ub+"-"+sub+"-"+"00"+act);
}
}
      
function ajax_act(opcion,id){
    
}
</script>
</head>
<body>  
  <div class="preloader-it">
    <div class="la-anim-1"></div>
  </div>
    <div class="wrapper theme-1-active box-layout pimary-color-red">
  <?php   include "../Componentes/menu.php";  ?>  
    <div class="page-wrapper">
        <div class="container-fluid">
         
         <div class="panel panel-success card-view">
<div class="panel-heading text-center">
<div class="pull-center" >
<h2 class="panel-title panel-center txt-light"><i class="fa fa-plus"></i> Nuevo Activo</h2>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row">
<div class="row">
<div class="col-md-12">
<div class="col-md-6">
<?php 
$sentencia = "SELECT * FROM activo  order by idAc desc"; 
$ejecutar=mysqli_query($mysqli,$sentencia);
$fila = mysqli_fetch_assoc($ejecutar);

$sentencia2= "SELECT * FROM institucion "; 
$ejecutar2=mysqli_query($mysqli,$sentencia2);
$fila2 = mysqli_fetch_assoc($ejecutar2);

?>
<input type="hidden"  class="form-control" id="idIns" name="idIns" placeholder="Nombre" value="<?php echo $fila2['codigo'];?>">
<input  type="hidden" class="form-control" id="idActivo" name="idActivo" placeholder="Nombre" value="<?php echo $fila['idAc']+1;?>">
<div class="form-group">
<label for="cat" >Categoria:</label>
<form  action="compraNueva2.php" method="post" class="form-register" > 
<select class="form-control SCategoria" data-live-search="true" id="cat" name="cat" onchange="this.form.submit()" >
<?php
$a1=$_POST['cat'];             
if (!empty($a1)) {
$extraer="SELECT * FROM categoria WHERE idCat=$a1";
}
else{
$extraer="SELECT * FROM categoria";
?>
<option >Seleccione</option>
<?php
}
$ejecutar=mysqli_query($mysqli,$extraer);
while($ejecuta=mysqli_fetch_array($ejecutar))
{
if (($ejecuta['estado'])==1) {
?>  
<option id="ide" value="<?php  echo $ejecuta['idCat'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>             
<?php
$a2=$ejecuta['cod'];
}
}
?>  
</select> 
</form>
</div>
<div class="form-group">
<label for="ubica" >Ubicación:</label>
<br>
<select class="form-control SUbicacion" data-live-search="true" id="ubica" name="ubica"  >
<option> </option>
<?php
$extraer="SELECT * FROM ubicacion";
$ejecutar=mysqli_query($mysqli,$extraer);
while($ejecuta=mysqli_fetch_array($ejecutar))
{
if (($ejecuta['estado'])==1) {
?>  
<option id="ide" value="<?php  echo $ejecuta['codU'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>             
<?php
} 
}
?>                   
</select> 
</div>
<div class="form-group">
<label for="codigo" >Código:</label>
<div class="input-group">
<input type="text" readonly="readonly" class="form-control" id="codigo"  name="codigo" >
<div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true" ></span></div>
</div>
</div>
<br>
<br>
</div>
<form  action="insert.php" method="post" class="form-register" > 
<div class="col-md-6">
<input type="hidden" class="form-control" id="ubica2" placeholder="Nombre" name="ubica2" >
<input type="hidden" class="form-control" id="idcat" placeholder="Nombre" name="idcat" >
<input  type="hidden" class="form-control" id="codi" placeholder="Nombre" name="codi" >
<div class="form-group">
<label for="sub" >Sub-Categoria:</label>
<br>
<select class="form-control SSubCategoria" data-live-search="true" id="sub" name="sub" >
<option ></option>
<?php
if (!empty($a1)) {
$extraer="SELECT * FROM subcategoria WHERE idcat='$a1'";
$ejecutar=mysqli_query($mysqli,$extraer);
while($ejecuta=mysqli_fetch_array($ejecutar))
{
if (($ejecuta['estado'])==1) {
?>    
<option  id="ide2" value="<?php  echo $ejecuta['codigo'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>
<?php
}
}
}else{
?>
<?php
}
?>                    
</select>              
</div>
<div class="form-group">
<label for="des">Descripcion </label>
<div class="input-group">
<input type="text" class="form-control" id="des" placeholder="EJ:NISSAN 2018" name="des">
<div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></div>
</div>
</div>
</div>
<input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">
<div class="row text-center"> 
<div class="button-group">
<button type="button"  class="btn btn-danger btn-lable-wrap left-label"  onclick="recibe()"> <span class="btn-label"><i class="fa fa-usb"></i> </span><span class="btn-text">Calcular Codigo</span></button>
<button type="submit"  class="btn btn-info btn-lable-wrap left-label"> <span class="btn-label"><i class="fa fa-save"></i> </span><span class="btn-text">Continuar</span></button>
<button type="button"  class="btn btn-danger btn-lable-wrap left-label" data-dismiss="modal" onclick="envia()"> <span class="btn-label"><i class="fa fa-close"></i> </span><span class="btn-text">Cancelar</span></button>
</div>
</div>
</form>
</div>
</div>
</div>

 <!-- Row -->
<div class="row text-center">
<form id="example-advanced-form" action="#">
<div class="col-md-12">
   
    <div class="col-md-6">
        
    </div>
    <div class="col-md-6"></div>
    
</div>

<h3><span class="number"><i class="icon-user-following txt-black"></i></span><span class="head-font capitalize-font">signup</span></h3>
<fieldset>
<div class="row">

</div>
</fieldset>

<h3><span class="number"><i class="icon-bag txt-black"></i></span><span class="head-font capitalize-font">shipping</span></h3>
<fieldset>
<div class="row">

</div>
</fieldset>

</form>
</div>
<!-- /Row -->

  
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
<script>
        $(function () {
            $('.SCategoria').select2()
            $('.SSubCategoria').select2()
            $('.SUbicacion').select2()
            
        });
    </script>
</body>

</html>


    
        
