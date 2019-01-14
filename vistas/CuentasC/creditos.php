<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Creditos</title>
  <?php
      include "../Componentes/estilos.php";
  ?>

<script language="javascript">
function sele(){
var cond= $("#condi").val();
if (cond==1) {
window.location="creditos.php";
}
}
    function ajax_act(id,opcion) {
if (window.XMLHttpRequest) {
xmlhttp = new XMLHttpRequest();
}
else {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function () {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById("actualizar").innerHTML = xmlhttp.responseText;    
// Recarga Tabla con Nuevos Datos
$('.tablaAct').DataTable();
}
}
xmlhttp.open("post", "../../asset/ajax/cuentasXcobrar.php?id="+id+"&opcion="+opcion, true);
xmlhttp.send();
}

function editarC(id,tabla){
     if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("modalsE").innerHTML = xmlhttp.responseText;     
                    //alert(xmlhttp.responseText);
                    $("#ModalCreditoEditar").modal('show');
                    $('.STipoGarantia').select2()
                }
            }
            xmlhttp.open("post", "../Componentes/modalsEditar.php?actualiza=" +tabla + "&id=" + id, true);
            xmlhttp.send();
}
window.onload = function() { 
ajax_act('',"creditos");
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
                    <h3 class="panel-title panel-center txt-light"><i class="fa fa-wrench"></i>  Gestionar Tipos de Creditos</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                 <?php
                    $cont=0;
                    ?>
                <div class="row text-center">
                  <div class="form-group">
                    <button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalRegistarCredito"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Nuevo Credito</span></button>
                  </div>
                    </div>
                    <div class="row">
                  <div class="table-wrap">
                    <div class="table-responsive" id="actualizar">
                    </div>
                  </div>
                </div>
                </div>
            </div>
        </div>
           

       <!--Modal  Registrar -->
<div id="ModalRegistarCredito" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
    <div class="color-moduloInventario">
       <div class="modal-body">
<div class="panel panel-success card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Registrar Credito</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
    <div class="row">
<div class="col-md-6 ">
<div class="form-group">
  <label for="nombcre" >Nombre de Credito:</label>
  <div class="input-group">
  <input type="text" required="true" autocomplete="off" class="form-control"  id="nombcre" name="nombcre" placeholder="Nombre" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<div class="form-group">
  <label for="minip" >Mínimo a Prestar:</label>
  <div class="input-group">
  <input type="number" required="true" min="1" autocomplete="off" class="form-control" id="minip" name="minip" placeholder="100">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>

<div class="form-group">
  <label for="inter">Interes Anual(%):</label>
  <div class="input-group">
  <input type="number" min="1" required="true" autocomplete="off" class="form-control" id="inter" name="inter">
  <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
  </div>
</div>
</div>

<div class="col-md-6">

<div class="form-group">

  <label for="pmax" >Plazo Máximo:</label>
  <div class="input-group">
  <input type="number" min="1" required="true" autocomplete="off" class="form-control" id="pmax" name="pmax" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<div class="form-group">
  <label for="maxp">Máximo a Prestar:</label>
  <div class="input-group">
  <input type="number" min="1" autocomplete="off" required="true" class="form-control" id="maxp" name="maxp">
  <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
  </div>
</div>

<div class="form-group ">
  <label for="gara">Tipo de Garantía:</label>
  <br>
  <select class="form-control select2" data-live-search="true" name="gara" id="gara" >
    <option value="Aval">Aval</option>
    <option value="Hipoteca">Hipoteca</option>
    <option value="Embargo">Embargo</option>
    <option value="Seguro">Seguro</option>
  </select>  

</div>
</div>


 </div>
									</div>
								</div>
							</div>
		
 
  
 <div class="modal-footer">
<?php include '../Componentes/BtnGuardarCancelar.php'; ?>
        </div>
      </div>
      </div>
 </div>
 </form>
 </div>

<!--Fin modal Registrar Proveedor-->
        
        
      </div>
      <div id="modalsE"></div>
    <!-- /#wrapper -->
        <!-- Footer -->
        <?php include '../Componentes/footer.php'; ?>
        <!-- /Footer -->
      </div>
    </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
  
  
  <?php
include "../Componentes/scripts.php";
?>
  <script>
        $(function () {
            $('.STipoGarantia').select2()
        });
    </script>
</body>

</html>


    
        
