<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Gestionar Registros</title>
  <?php   include "../Componentes/estilos.php";  ?>
   <?php include "../Componentes/scripts.php";  ?>
   <script src="../../asset/js/activoFijo.js"></script>    
    <script>
        $(function () {
            $('.SEstado').select2()
            $('.STipoCategoria').select2()
        });
        
        var cambio='<?php echo $_REQUEST['paso']; ?>';
        if(cambio===null || cambio==="")
            cambio="ubicacion";
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
                    <h3 class="panel-title panel-center txt-light"><i class="fa fa-wrench"></i> Gestión de Registros</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="row text-center">
                        <div class="row text-center">
								 	<div class="form-group">								 	
								 	<button type="button" class="btn btn-success btn-lable-wrap left-label" onclick="actualizar('ubicacion')"> <span class="btn-label"><i class="fa fa-map"></i> </span><span class="btn-text">Ubicación</span></button>
								 	<button type="button" class="btn btn-success btn-lable-wrap left-label" onClick="actualizar('proveedor')"> <span class="btn-label"><i class="fa fa-male"></i> </span><span class="btn-text">Proveedor</span></button>
								 <!--	<button type="button" class="btn btn-success btn-lable-wrap left-label" onClick="actualizar('movimiento');"> <span class="btn-label"><i class="fa fa-history"></i> </span><span class="btn-text">Movimiento</span></button> -->
								 	<button type="button" class="btn btn-success btn-lable-wrap left-label" onClick="actualizar('marca');"> <span class="btn-label"><i class="fa fa-list-alt"></i> </span><span class="btn-text">Marca</span></button>
								 	<button type="button" class="btn btn-success btn-lable-wrap left-label" onClick="actualizar('categoria');"> <span class="btn-label"><i class="fa fa-list"></i> </span><span class="btn-text">Categoria</span></button>
								 	<!-- <button type="button" class="btn btn-success btn-lable-wrap left-label" onClick="actualizar('subcategoria');"> <span class="btn-label"><i class="fa fa-outdent"></i> </span><span class="btn-text">Sub-Categoria</span></button> -->
								 	</div>
								</div> 
                    </div>
                    <div class="row">
                        <div class="col-md-4" >
                            <div class="alert alert-success alert-dismissable alert-style-1">
                                <i class="fa fa-gear"></i><h6 id="gestion" ></h6>
                            </div>
                        </div>
                        <div class="col-md-5"></div>
                        <div class="col-md-1"> <button class="btn  btn-default btn-outline">Estado</button></div>
                        <div class="col-md-2">
                            <div class="form-group">                                     
                                <select class="form-control select2 select2-hidden-accessible" data-live-search="true" id="condi" name="condi" onchange="sele()">
                                    <option value="1" >Activo</option>											 
                                    <option value="0">Inactivo </option>
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


    
        
        