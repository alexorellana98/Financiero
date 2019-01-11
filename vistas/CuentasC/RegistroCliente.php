<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Clientes</title>
  <?php
      include "../Componentes/estilos.php";
  ?>
  <script src="../../asset/js/cuentasXcobrar.js"></script>
  <script language="javascript">
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/CuentasC/DatosCliente.php";
  }
 function sele(){
  var cambio= $("#condi2 option:selected").text();
  $("#gestion").text("Administración Clientes: "+MaysPrimera(cambio));
  var cond= $("#condi").val();
  var tipo= $("#condi2").val();
  ajax_act('','cliente',cond,tipo);
}
function MaysPrimera(string){
  return string.charAt(0).toUpperCase() + string.slice(1);
}
    window.onload = function() {
        $("#condi").val('2');
        $("#condi2").val('3');
        $("#condi").change();
        $("#condi2").change();
    };
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
            <div class="panel panel-primary card-view" style="margin-top: 20px;">
                <div class="panel-heading text-center">
                    <div class="pull-center">
                        <h3 class="panel-title txt-light" id="titulo"><i class="fa fa-male"></i>Clientes</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                    
                    <div class="row">
                    <div class="col-md-5" >
                            <div class="alert alert-success alert-dismissable alert-style-1">
                                <i class="fa fa-gear"></i><h6 id="gestion">Administración de Clientes</h6>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                         <div class="col-md-1"> <button class="btn  btn-default btn-outline">Estado:</button></div>
                        <div class="col-md-2 ">
                            <div class="form-group">
                                <select class="form-control SEstado" data-live-search="true" id="condi" name="condi" onchange="sele()">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                    <option value="2">Todos</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-1"> <button class="btn  btn-default btn-outline">Cartera:</button></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control SCartera" data-live-search="true" id="condi2" name="condi2" onchange="sele()" style="width: 100%;">
                                    <option value="0">Normales</option>
                                    <option value="1">Morosos</option>
                                    <option value="2">Incobrables</option>
                                    <option value="3">Todos los clientes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
          
                    <?php

                    $cont=0;
                    ?>
                    <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                       <div class="text-center">
                        <div class="form-group">
                           <button class="btn btn-primary btn-lable-wrap left-label" onclick="envia()"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Nuevo Cliente</span></button>
                        </div>
                    </div>
                    <div class="table-responsive" id="actualizar">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
        <!-- /Row -->
      </div>
    <!-- /#wrapper -->
       
       <!--- Modal -->
        <div class="modal fade" id="editarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h3 class="modal-title" id="exampleModalLabel">Opciones Cliente</h3> </center>
                    </div>
                    <div class="modal-body">                       
                       <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_content" id="cargala">
                          
                          </div>
                        </div>
                      </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->
        
        
        
        
        <!-- Footer -->
       <?php  include '../Componentes/footer.php'; ?>
        <!-- /Footer -->
        
    </div>
    </div>
  <?php
include "../Componentes/scripts.php";
?>
<script>
        $(function () {
            $('.SEstado').select2()
            $('.SCartera').select2()
        });
    </script> 
</body>

</html>


    
        
