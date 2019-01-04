<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Clientes</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>
  <script src="../../asset/js/cuentasXcobrar.js"></script>
  <script language="javascript">
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/CuentasC/DatosCliente.php";
  }
 function sele(){
  var cond= $("#condi").val();
  var tipo= $("#condi2").val();
  ajax_act('','cliente',cond,tipo);
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
        <!-- Title -->
          <div class="row heading-bg">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h3 align="center" id="titulo">Clientes</h3>
            </div>
          </div>
          <!-- /Title -->
          <div class="col-md-10 col-md-offset-2">
 <div class="col-md-3">
<br>
 <div class="form-group">  
<button type="button"  class="btn btn-success " onclick="envia()">Registrar Nuevo Cliente</button>
</div>
</div>

<div class="col-md-2 ">
<div class="form-group">
<label for="condi">Estado :</label>
<select class="form-control SEstado" data-live-search="true" id="condi" name="condi" onchange="sele()">
<option value="1" >Activo</option>
<option value="0">Inactivo</option>
<option value="2">Todos</option>
</select>
</div>
</div> 
<div class="col-md-4">
<div class="form-group">

  <label for="condi">Cartera:</label>
 <select class="form-control SCartera" data-live-search="true" id="condi2" name="condi2" onchange="sele()" style="width: 100%;">
<option value="0" >Normales</option>
<option value="1">Morosos</option>
<option value="2">Incobrables</option>
<option value="3">Todos los clientes</option>
</select>
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
                    <div class="table-responsive" id="actualizar">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
        <!-- /Row -->
        <div class="col-md-1"></div> 
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
        <footer class="footer container-fluid pl-30 pr-30">
          <div class="row">
            <div class="col-sm-12">
              <p>2017 &copy; Doodle. Pampered by Hencework</p>
            </div>
          </div>
        </footer>
        <!-- /Footer -->
      </div>
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


    
        
