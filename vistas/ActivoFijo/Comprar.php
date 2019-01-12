<?php require 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>Adquisición de activo fijo</title>
<?php
include "../Componentes/estilos.php";
?> <!-- Include SmartWizard CSS -->
<link href="../Plantilla/vendors/bower_components/SmartWizard-master/dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />
<!-- Optional SmartWizard theme -->
<link href="../Plantilla/vendors/bower_components/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
<link href="../Plantilla/vendors/bower_components/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
<link href="../Plantilla/vendors/bower_components/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

<?php include "../Componentes/scripts.php"; ?>
<script src="../../asset/js/activoFijo.js"></script>
<script language="javascript">
function nuevoActivo(){
document.location.href="CompraActivo.php";
}
function sele(){
var cond= $("#condi").val();
ajax_act('','compraactivo',cond);
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
alerta('Error','Complete los campos...','red');
}
else{
$('#codigo').val(ins+"-"+ub+"-"+sub+"-"+"00"+act);
var v1= $("#cat ").val();
$('#idcat').val(v1);
$('#ubica2').val(ub);
$('#codi').val(ins+"-"+ub+"-"+sub+"-"+"00"+act);
}
}

function ajax_ac(opcion,id,formulario){
var url,data;
var id=document.getElementById('cat').value;
if(opcion=='comboSubCategoria'){
url="../../asset/ajax/actualizarCombos.php";
data={'id': id , 'opcion': 'subcategoria' }
}
if(opcion=="guardar"){
url="insert.php";
data=$("form#"+formulario).serialize();
alert(data);
}

$.ajax({
url: url
, data: data
, success: function (result) {
$("#sub").html(result);

}
});
}

function alerta(titulo,contenido,tipo){
$.confirm({
title: titulo,
content: contenido,
type: tipo,
typeAnimated: true,
buttons: {
tryAgain: {
text: 'Ok',
btnClass: 'btn-success',
action: function(){
}
}
}
}); 
}

function guardar(){
    alert('ENtre a guardar');
    
    
    var categoria=$('#cat').val();
    var subcategoria=$('#sub').val();
    var condicion=$('#condi').val();
    var ubicacion=$('#ubica').val();
    var codigo=$('#codigo').val();
    var descrpcion=$('#des').val();
    var serie=$('#serie').val();
    var fecha=$('#dona').val();
    var prec=$('#prec').val();
    //var vida=$('#vi').val();
    
    if( ubicacion=="" || codigo=="" || descrpcion=="" || serie=="" || fecha=="" || prec=="")
        alerta("Error","Complete los campos",'red');
    else{
        ajax_ac('guardar','','muebles');
        ajax_ac('guardar','','inmuebles');
    } 
}
    window.onload = function() { 
    $("#condi").val('1'); 
    $("#condi").change();
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
<div class="panel panel-primary card-view " style="margin-top: 20px;">
<div class="panel-heading text-center">
<div class="pull-center">
<h3 class="panel-title panel-center txt-light"><i class="fa fa-wrench"></i>  Gestionar  Adquisición de Activo Fijo</h3>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-1">
<button class="btn  btn-default btn-outline">Estado</button>
</div>
<div class="col-md-2">
<div class="form-group">                                     
<select class="form-control SEstado" data-live-search="true" id="condi" name="condi" onchange="sele()">
<option value="1" >Activo</option>											 
<option value="0">Inactivo </option>
</select>
</div>
</div> 
</div>
</div>
</div>
</div>
<?php       $cont=0;          ?>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">

<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row text-center">
<div class="form-group">
<button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#madalAgregar" > <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Nuevo Activo</span></button>
</div>
</div>
<div class="table-wrap">
<div class="table-responsive" id="actualizar">



</div>

<br>
<br>
<br>
<br>
<br>
</div>
</div>
</div>
</div> 
<br>
<br>
<br>
<br>
<br> 
</div>
</div>
<!-- /Row --> 


<!-- Modal -->
<div class="modal fade" id="madalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-body">
<div class="panel panel-success card-view">
<div class="panel-heading text-center">
<div class="pull-center" >
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2 class="panel-title panel-center txt-light"><i class="fa fa-plus"></i>  Nuevo Activo</h2>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">

<div id="smartwizard">
<ul>
<li><a href="#step-1">Registro<br /><small></small></a></li>
<li><a href="#step-2">Finalizar<br /><small></small></a></li>
</ul>

<div>
<div id="step-1" class="">
<div class="row">
<form   method="post" class="form-register" id="muebles"> 
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
<select class="form-control SCategoria" data-live-search="true" id="cat" name="cat" onchange="ajax_ac('comboSubCategoria','')" >
<?php
$a1=$_POST['cat'];             
if (!empty($a1)) {
$extraer="SELECT * FROM categoria WHERE idCat=$a1";
}
else{
$extraer="SELECT * FROM categoria";
?>
<option>Seleccione</option>
<?php
}
$ejecutar=mysqli_query($mysqli,$extraer);
while($ejecuta=mysqli_fetch_array($ejecutar))
{
if (($ejecuta['estado'])==1) {
?>
<option id="ide" value="<?php  echo $ejecuta['idCat'] ?>">
<?php  echo ucwords(strtolower($ejecuta['nombre'])) ?>
</option>
<?php
$a2=$ejecuta['cod'];
}
}
?> 
</select> 
</div>
<div class="form-group">
<label for="ubica" >Ubicación:</label>
<br>
<select class="form-control SUbicacion" data-live-search="true" id="ubica" name="ubica" required>
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
<input type="text" readonly="readonly" class="form-control" id="codigo"  name="codigo" required >
<div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true" ></span></div>
</div>
</div>
<br>
<br>
</div>
<div class="col-md-6">
<input type="hidden" class="form-control" id="ubica2" placeholder="Nombre" name="ubica2" >
<input type="hidden" class="form-control" id="idcat" placeholder="Nombre" name="idcat" >
<input  type="hidden" class="form-control" id="codi" placeholder="Nombre" name="codi" >
<div class="form-group">
<label for="sub" >Sub-Categoria:</label>
<br>
<select class="form-control SSubCategoria" data-live-search="true" id="sub" name="sub" required >                    
</select>              
</div>
<div class="form-group">
<label for="des">Descripcion </label>
<div class="input-group">
<input type="text" class="form-control" id="des" placeholder="" name="des" required>
<div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></div>
</div>
</div>
</div>
<div class="row text-center"> 
<div class="button-group">
<button type="button"  class="btn  btn-success btn-outline btn-lable-wrap left-label"  onclick="recibe()"> <span class="btn-label"><i class="fa fa-barcode"></i> </span><span class="btn-text">Calcular Código</span></button>
</div>
</div>
</div>
</form>
</div>

</div>
<div id="step-2" class="">
<form  method="post" class="form-register" id="inmuebles" > 
<div class="col-lg-12">
<div class="col-md-6">
 <?php 
//Para obtener numero de registro 
   $sentencia = "SELECT * FROM activo  order by idAc desc"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
 ?>
<input type="hidden" class="form-control" id="idac" placeholder="Nombre" name="idac"  value="<?php  echo $fila['idAc']; ?>">
<div class="form-group">
<label for="serie" >Marca:</label>
<select class="form-control SMarca" data-live-search="true" id="marca" name="marca"  >
<?php
$extraer="SELECT * FROM marca";
$ejecutar=mysqli_query($mysqli,$extraer);
while($ejecuta=mysqli_fetch_array($ejecutar))
{
?>  
<option id="ide" value="<?php  echo $ejecuta['idMarca'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>              
<?php
}
?>                   
</select> 
</div>
<div class="form-group">
<label for="serie" >Serie/Placa:</label>
<div class="input-group">
<input type="text" class="form-control" id="serie" placeholder="serie" name="serie" required >
<div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
</div>
</div>
<input type="hidden"  class="form-control" id="ubica" name="ubica" placeholder="Nombre" value="<?php echo $fila['idUb'];?>">
<div class="form-group">
<label for="fecha">Fecha de inicio de uso:</label>
<div class="input-group">
<input type="date" class="form-control" id="fecha" name="fecha" required>
<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
</div>
</div>
<div class="form-group">
<label for="dona">Donacion: </label>
<div class="input-group">
<input type="checkbox" name="dona" id="dona"  value="1">
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="prov" >Proveedor:</label>
<select class="form-control SProveedor" data-live-search="true" id="prov" name="prov"  required>
<?php
$extraer="SELECT * FROM proveedor";
$ejecutar=mysqli_query($mysqli,$extraer);
while($ejecuta=mysqli_fetch_array($ejecutar))
{
?>  
<option id="ide" value="<?php  echo $ejecuta['ide'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>                    
<?php
}
?>                    
</select> 
</div>
<div class="form-group">
<label for="prec">Precio: </label>
<div class="input-group">
<input type="number" class="form-control" id="prec" placeholder="" name="prec" min="0" onchange="total()" required  >
<div class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></div>
</div>
</div>
<div class="form-group">
<label for="condi">Condicion: </label>
<select class="form-control selectpicker" id="condi" name="condi" onchange="condic(this.value)">
<option></option>
<option value="Nuevo">Nuevo </option>
<option value="Usado">Usado </option>
</select>
</div>
<div class="form-group" id="hi" style="display:none;">
<label for="cant" >Vida util: </label>
<div class="input-group">
<input type="number" class="form-control" id="vi" placeholder="" name="vi" min="0" required>
<div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>
</div>
</div>
</form>

</div>

</div>
</div>
</div>
 <div class="modal-footer">
<div class="row">
<div class="button-group" style="margin-top:25px;">
<button type="button"  class="btn btn-info btn-lable-wrap left-label" onclick="guardar()"> <span class="btn-label"><i class="fa fa-save"></i> </span><span class="btn-text">Guardar</span></button>
<button type="button"  class="btn btn-danger btn-lable-wrap left-label" data-dismiss="modal" onclick="envia()"> <span class="btn-label"><i class="fa fa-close"></i> </span><span class="btn-text">Cancelar</span></button>
</div>
</div>
    </div>
</div>
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

<script>
$(function () {
$('.SEstado').select2()
$('.SCategoria').select2()
$('.SSubCategoria').select2()
$('.SUbicacion').select2()
$('.SMarca').select2()
$('.SProveedor').select2()
$('.SCondicion').select2()
});
</script>

<script type="text/javascript" src="../Plantilla/vendors/bower_components/SmartWizard-master/dist/js/jquery.smartWizard.min.js"></script>

<script type="text/javascript">
    //funcion para mostrar el de vida util si esta usado
  function condic(valor){
    if (valor=="Usado") {
    document.getElementById('hi').style.display='block';
    } else {
    document.getElementById('hi').style.display='none';  
    }
  }
$(document).ready(function(){
// Toolbar extra buttons
var btnFinish = $('<button></button>').text('Finish')
.addClass('btn btn-success')
.on('click', function(){ alert('Finish Clicked'); });
var btnCancel = $('<button></button>').text('Cancel')
.addClass('btn btn-danger')
.on('click', function(){ $('#smartwizard').smartWizard("reset"); });

// Smart Wizard
$('#smartwizard').smartWizard({
selected: 0,
theme: 'default',
transitionEffect:'fade'
});
});
</script>

</body>

</html>




