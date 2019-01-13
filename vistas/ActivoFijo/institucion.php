<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Gestionar Registros</title>
  <?php
      include "../Componentes/estilos.php";
  ?>
   <?php
include "../Componentes/scripts.php";
?>    
    <script>
        $(function () {
            $('.SEstado').select2()
            $('.STipoCategoria').select2()
        });
    </script>
	<script src="../../asset/js/activoFijo.js"></script>
    <script language="javascript">
        var cambio='<?php echo $_REQUEST['paso']; ?>';
        if(cambio===null || cambio==="")
            cambio="institucion";
        else{
            var resultado='<?php echo $_REQUEST['resultado']; ?>';
            var tipo='<?php echo $_REQUEST['tipo']; ?>';
            if(tipo==="modificacion"){
                    if(resultado==='1')
                        alerta("Exito ",""+MaysPrimera(cambio)+ " modificado","green");
                else if(resultado==='0')
                    alerta("Error",""+MaysPrimera(cambio)+"  no se pudo modificar","red");
            }
            if(tipo==="agregar"){
                    if(resultado==='1')
                        alerta("Exito ",""+MaysPrimera(cambio)+ " agregado","green");
                else if(resultado==='0')
                    alerta("Error",""+MaysPrimera(cambio)+"  no se pudo agregar","red");
            }
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
function editar(id,tabla){
     if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("modalsE").innerHTML = xmlhttp.responseText;                    
                    $('.SCategoriaEditar').select2()
                    //alert(xmlhttp.responseText);
                    $("#"+tabla).modal('show');
                }
            }
            xmlhttp.open("post", "../Componentes/modalsEditar.php?actualiza=" +tabla + "&id=" + id, true);
            xmlhttp.send();
}
        
function sele(){
    $("#gestion").text("Administrar "+MaysPrimera(cambio));
    //document.getElementById("gestion").value=MaysPrimera(cambio);
    var cond= $("#condi").val(); 
    ajax_act('',cambio,cond); 
} 
function actualizar(va){
    cambio=va; 
    $("#condi").val('1'); 
    $("#condi").change();
    
}
function MaysPrimera(string){
  return string.charAt(0).toUpperCase() + string.slice(1);
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
                    <h3 class="panel-title panel-center txt-light"><i class="fa fa-institution"></i> Institución</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="alert alert-success alert-dismissable alert-style-1">
                                <i class="fa fa-gear"></i><h6 id="gestion" >Información y Configuración de la Institución</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="../../img/lains.png"  height="500">
                        </div>
                        <div class="col-md-6">
                            <?php 
                            $sentencia = "SELECT * FROM institucion WHERE idIn=1"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
                            
                            ?>
<div class="panel panel-primary card-view">
<div class="panel-heading text-center">
<div class="pull-center" >
<h2 class="panel-title panel-center txt-light">Detalle Institución</h2>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<label for="nombMov" >Nombre:</label>
<div class="input-group">
<input type="text" class="form-control" id="nombI" name="nombI" placeholder="Ingrese un Nombre" required value="<?php echo $fila['Nombre'];?>" disabled>
<div class="input-group-addon"><span  class="fa fa-institution" aria-hidden="true"></span></div>
</div>
<br>
<label for="codUb" >Código:</label>
<div class="input-group">
<input type="text" class="form-control" id="nombCo" name="nombCo" placeholder="Ingrese un código" required value="<?php echo $fila['codigo'];?>" disabled>
<div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
</div> 

<br>
<label for="codUb" >Dirección:</label>
<div class="input-group">
<textarea type="text" class="form-control" id="dire" name="dire" placeholder="Ingrese una Direccion" disabled><?php echo $fila['direccion'];?></textarea> 
<div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
</div>
<br>
<button class="btn btn-success btn-block btn-rounded btn-outline btn-anim" onclick="editar('1','ModalInstitucionEditar');"><i class="fa fa-edit"></i><span class="btn-text">Modificar Información</span><div></div></button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
      </div>
      <?php include '../Componentes/modals.php'; ?>
      <div id="modalsE">
          
      </div>
      <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
    <!-- /#wrapper -->
        <!-- Footer -->
        <?php include '../Componentes/footer.php'; ?>
        <!-- /Footer -->
      </div>
    </div>
 
</body>

</html>


    
        
        