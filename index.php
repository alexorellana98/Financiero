<?php
$mysqli = new mysqli('localhost', 'root', '', 'siccif');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Gestionar Registros</title>
 <!-- Favicon -->
        <link rel="shortcut icon" href="../Plantilla/favicon.ico">
        <link rel="icon" href="../Plantilla/favicon.ico" type="image/x-icon">
        <!-- Bootstrap Colorpicker CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
        <!-- select2 CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
        <!-- switchery CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
        <!-- bootstrap-select CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
        <!-- bootstrap-tagsinput CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
        <!-- vector map CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/jquery-wizard.js/css/wizard.css" rel="stylesheet" type="text/css"/>
        <!-- jquery-steps css -->
        <link rel="stylesheet" href="vistas/Plantilla/vendors/bower_components/jquery.steps/demo/css/jquery.steps.css">
        <!-- bootstrap-touchspin CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/>
        <!-- multi-select CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap Switches CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap Datetimepicker CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
        <!-- Jasny-bootstrap CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Data table CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <!-- Custom CSS -->
        <link href="vistas/Plantilla/dist/css/style.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap table CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/bootstrap-table/dist/bootstrap-table.css" rel="stylesheet" type="text/css"/>
        <!-- Fancy-Buttons CSS -->
        <link href="vistas/Plantilla/dist/css/fancy-buttons.css" rel="stylesheet" type="text/css">
        <!-- switchery CSS -->
        <link href="vistas/Plantilla/vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
        
        <!-- JQuery Confirm -->
        <link href="vistas/Plantilla/vendors/bower_components/jquery-confirm-master/css/jquery-confirm.css" rel="stylesheet" type="text/css"/>   
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
            xmlhttp.open("post", "vistas/Componentes/modalsEditar.php?actualiza=" +tabla + "&id=" + id, true);
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


        <!-- Top Menu Items -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="mobile-only-brand pull-left">
                <div class="nav-header pull-left">
                    <div class="logo-wrap">
                            <img class="brand-img" src="img/logon.png" width="30" height="30"/>
                            <span class="brand-text">Financiero</span>
                    </div>
                </div>  
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
                <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
            </div>  
        </nav>
        <!-- /Top Menu Items -->
        
        <!-- Left Sidebar Menu -->
        <div class="fixed-sidebar-left">
            <ul class="nav navbar-nav side-nav nicescroll-bar">
                <li class="navigation-header">
                    <span>Menu Principal</span> 
                    <i class="zmdi zmdi-more"></i>
                </li>
                
                <li>
                    <a href="vistas/ActivoFijo/institucion.php"><div class="pull-left"><i class="fa fa-institution"></i><span class="right-nav-text"> Institución </span></div><div class="pull-right"></div><div class="clearfix"></div></a>
                </li>
                
                
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="fa fa-gear"></i><span class="right-nav-text">  Activo Fijo </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="app_dr" class="collapse collapse-level-1">
                        <li>
                            <a  href="vistas/ActivoFijo/gestionRegistros.php">Gestión de Registros</a>
                        </li>
                        <li>
                            <a href="vistas/ActivoFijo/Comprar.php">Adquisición Activo Fijo</a>
                        </li>
                        <li>
                            <a  href="vistas/ActivoFijo/administrarActivo.php">Administrar Activo Fijo</a>
                        </li>
                        <li>
                            <a  href="vistas/ActivoFijo/buscarActivo.php">Buscar Activo Fijo</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a  href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr"><div class="pull-left"><i class="fa  fa-dollar"></i><span class="right-nav-text">Cuentas Por Cobrar</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="form_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a  href="vistas/CuentasC/creditos.php">Tipo Creditos</a>
                        </li>
                        <li>
                            <a  href="vistas/CuentasC/RegistroCliente.php">Clientes</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_dr"><div class="pull-left"><i class="fa fa-file-text-o"></i><span class="right-nav-text">  Reportes </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="chart_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a  href="vistas/ActivoFijo/ReporteActivo.php">Activos</a>
                        </li>
                        <li>
                            <a  href="vistas/ActivoFijo/ReporteActivoInactivo.php">Activos Inactivos</a>
                        </li>
                        <li>
                            <a href="vistas/ActivoFijo/ReporteProveedores.php">Proveedores</a>
                        </li>
                        <li>
                            <a href="vistas/ActivoFijo/ReporteProveedoresInac.php">Proveedores Inactivos</a>
                        </li>
                        <li>
                            <a href="vistas/ActivoFijo/ReporteVentas.php">Ventas</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /Left Sidebar Menu -->
        

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
                            <img src="img/lains.png"  height="500">
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
<div class="input-group-addon"><span  class="fa fa-map" aria-hidden="true"></span></div>
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
      <?php include 'vistas/Componentes/modals.php'; ?>
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
        <?php include 'vistas/Componentes/footer.php'; ?>
        <!-- /Footer -->
      </div>
    </div>
 <!-- JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- jQuery -->
        <script src="vistas/Plantilla/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vistas/Plantilla/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        <!-- Form Wizard JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/jquery.steps/build/jquery.steps.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
        <!-- Form Wizard Data JavaScript -->
        <script src="vistas/Plantilla/dist/js/form-wizard-data.js"></script>
        <!-- Slimscroll JavaScript -->
        <script src="vistas/Plantilla/dist/js/jquery.slimscroll.js"></script>
        <!-- Fancy Dropdown JS -->
        <script src="vistas/Plantilla/dist/js/dropdown-bootstrap-extended.js"></script>
        <!-- Owl JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
        <!-- Switchery JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/switchery/dist/switchery.min.js"></script>
        <!-- Init JavaScript -->
        <script src="vistas/Plantilla/dist/js/init.js"></script>
        <!-- Moment JavaScript -->
        <script type="text/javascript" src="vistas/Plantilla/vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
        <!-- Bootstrap Colorpicker JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <!-- Switchery JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/switchery/dist/switchery.min.js"></script>
        <!-- Select2 JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/select2/dist/js/select2.min.js"></script>
        <!-- Bootstrap Select JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <!-- Bootstrap Tagsinput JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <!-- Bootstrap Touchspin JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
        <!-- Multiselect JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/multiselect/js/jquery.multi-select.js"></script>
        <!-- Bootstrap Switch JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
        <!-- Bootstrap Datetimepicker JavaScript -->
        <script type="text/javascript" src="vistas/Plantilla/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        <!-- Form Advance Init JavaScript -->
        <script src="vistas/Plantilla/dist/js/form-advance-data.js"></script>
        <!-- Data table JavaScript -->
        <script src="vistas/Plantilla/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="vistas/Plantilla/dist/js/dataTables-data.js"></script>
        <!-- JQuery Confirm -->
        <script src="vistas/Plantilla/vendors/bower_components/jquery-confirm-master/dist/jquery-confirm.min.js"></script>
</body>

</html>


    
        
        