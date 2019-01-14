<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Administrar Activo Fijo</title>
  <?php       include "../Componentes/estilos.php";   ?>
   <?php
include "../Componentes/scripts.php";
?>    
	<script src="../../asset/js/activoFijo.js"></script>
    <script language="javascript">
        
var cambio='<?php echo $_REQUEST['accion']; ?>';
        if(cambio===null || cambio==="")
            cambio="reevaluar";
        else{
            var resultado='<?php echo $_REQUEST['resultado']; ?>';
            var tipo='<?php echo $_REQUEST['tipo']; ?>';
            if(tipo==="agregar"){
                    if(resultado==='1')
                        alerta("Exito ",""+MaysPrimera(cambio)+ " con exito","green");
                else if(resultado==='0')
                    alerta("Error",""+MaysPrimera(cambio)+"  no se completo","red");
            }
        }

function sele(){
    var opcion=$("#cond").val();
    actualizar(opcion);
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
function actualizar(tabla){
     $("#gestion").text(MaysPrimera(tabla)+"  Activo Fijo");
     if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("actualizar").innerHTML = xmlhttp.responseText;  
                    $('.tablaAct').DataTable();
                }
            }
            xmlhttp.open("post", "../..//asset/ajax/administracionActivo.php?actualiza=" +tabla, true);
            xmlhttp.send();
}

function cargarModal(id){
     if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cargarModal").innerHTML = xmlhttp.responseText;  
                    //$('.tablaDetalle').DataTable();
                    $('.tablaDetalle').DataTable({"ordering": false});
                    $("#ModalDetalleActivo").modal('show');
                }
            }
            xmlhttp.open("post", "../..//asset/ajax/modalDetalle.php?id=" +id+"&opcion=activoDetalle", true);
            xmlhttp.send();
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
                    $("#"+tabla).modal('show');
                }
            }
            xmlhttp.open("post", "../Componentes/modalsEditar.php?actualiza=" +tabla + "&id=" + id, true);
            xmlhttp.send();
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
function MaysPrimera(string){
  return string.charAt(0).toUpperCase() + string.slice(1);
}
window.onload = function() { 
    actualizar("Mueble");
}

</script>

<style type="text/css">
.headt td {
  min-width: 235px;
  height: 100px;
  background-color: #433;
}
    </style>
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
                    <h3 class="panel-title panel-center txt-light"><i class="fa fa-search"></i>   Buscar Activos Fijos</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="row text-center">
                       <div class="col-md-4" >
                            <div class="alert alert-success alert-dismissable alert-style-1">
                                <i class="fa fa-list"></i><h6 id="gestion" ></h6>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-1">
                        <button class="btn  btn-default btn-outline">Buscar</button>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">                                     
                        <select class="form-control select2" data-live-search="true" id="cond" name="cond" onchange="sele()">
                        <option value="Mueble">Muebles</option>
                        <option value="Inmueble">Inmuebles</option>
                        <option value="depreciar" >Depreciables</option>											 
                        <option value="vender">Disponibles para la venta </option>
                        <option value="reevaluar">Reevaluables</option>
                        <option value="donacion">Donados</option>
                        </select>
                        </div>
                        </div> 
                   
                   
                   
                    </div>
                </div>
                </div>
                </div>
                    <?php  $cont=0;      ?>
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive" id="actualizar">
                    
                    </div>
                  </div>
                  <br>
                    
                </div>
              </div>
            </div>  
          </div>
        </div>
        <!-- /Row -->
      </div>
      <?php include '../Componentes/modals.php'; ?>
      <div id="modalsE">
          
      </div>
      <div id="cargarModal"></div>
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


    
        
        