<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

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

  <script language="javascript">
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/CuentasC/DatosCliente.php";
  }
 function sele(){
  var cond= $("#condi").val();
  if (cond==1) {
     window.location="http://localhost/Financiero/siccif/vistas/CuentasC/RegistroCliente.php";
  }else{window.location="http://localhost/Financiero/siccif/vistas/CuentasC/RegistroClienteInactivo.php";}

}
function sele2(){
  var cond2= $("#condi2").val();
  if (cond2==0) {
     window.location="http://localhost/Financiero/siccif/vistas/CuentasC/RegistroCliente.php";
  }else
  if (cond2==1) {
window.location="http://localhost/Financiero/siccif/vistas/CuentasC/RegistroCliente2.php";
  }
  else if (cond2==2) {window.location="http://localhost/Financiero/siccif/vistas/CuentasC/RegistroCliente3.php";}
  else{window.location="http://localhost/fina/siccif/vistas/CuentasC/TodosClientes.php";}

}
 //funcion para que la tabla se llene dinamicamente
  
    $(document).ready(function () {
   $('#entradafilter').keyup(function () {
      var rex = new RegExp($(this).val(), 'i');
        $('.contenidobusqueda tr').hide();
        $('.contenidobusqueda tr').filter(function () {
            return rex.test($(this).text());
        }).show();

        })

});
</script>
</head>
<?php
if (!empty($_GET['btnalta1']))  {
//activa el activo C:\xampp\htdocs\siccif\vistas\ActivoFijo
$est=1;
$var=$_GET['btnalta1'];
$sql = " UPDATE cliente set estado='$est' WHERE idCliente='$var'";
$resultado = $mysqli->query($sql); 
}
?>
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
              <h3 align="center" >Clientes Normales</h3>
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
 <select class="form-control" data-live-search="true" id="condi" name="condi" onchange="sele()">
<option></option> 
<option value="1" >Activo</option>
 
<option value="0">Inactivo </option>
</select>
</div>
</div> 
<div class="col-md-2 ">
<div class="form-group">

  <label for="condi">Cartera:</label>
 <select class="form-control" data-live-search="true" id="condi2" name="condi2" onchange="sele2()">
<option></option> 
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
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>

                         <tr >

    <th  WIDTH="50" HEIGHT='9' >N°</th>
    <th >Nombre</th>
    <th >NIT</th>
    <th >Ocupacion o Giro</th>
    <th >Departamento</th>
    <th >Tipo</th>
    <th WIDTH="100" HEIGHT='9'>Opciones</th>
  </tr>
  </thead>
  <tbody  class="contenidobusqueda">
  <?php
$extraer="SELECT * FROM cliente";

 //$base=mysqli_select_db($mysqli,'siccif');
 require 'conexion.php';
$ejecutar=mysqli_query($mysqli,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{if (($ejecuta['estado'])==1 && (($ejecuta['tipo'])==1)) {
  $cont=$cont+1;

    ?>  
  <tr>
    <td><?php  echo $cont ?> </td>
    <td><?php  echo $ejecuta['nombre']." ".$ejecuta['apellido'] ?> </td>
    <td> <?php echo $ejecuta['nit']?></td>
    <td> <?php echo $ejecuta['ocupacion']?></td>
    <td> <?php echo $ejecuta['depa']?></td>
    <td>Normal</td>
    <td>
     <form   action="verDetalleCliente.php" method="get" class="form-register" > 
     <button  type="submit" title="Ver Cliente" style="display: inline-block; " class="glyphicon glyphicon-eye-open btn-success " id="btndetalle" name="btndetalle" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idCliente'] ?>></button>
     </form>
     <form style=" margin-left: 30px; margin-top:-22px;" action="editarCliente.php" method="post" class="form-register" > 
      <button  type="submit" title="Modificar Cliente"  class="glyphicon glyphicon-cog btn-info" id="btnEditar" name="btnEditar" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idCliente']?>" ></button>
       </form>
      <form style=" margin-left: 60px; margin-top:-22px;"  action="prestamo.php" method="get" class="form-register">
     <button  type="submit" title="Realizar Prestamo" class="glyphicon glyphicon-usd btn-warning" id="btnEditar1" name="btnEditar1" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idCliente'] ?>></button>
     </form>
     <form  style=" margin-left: 90px; margin-top:-22px;" action="RegistroProveedor.php" method="get" class="form-register" > 
     <button  type="submit" title="Dar de baja Cliente" class="glyphicon glyphicon-arrow-down btn-danger" id="btnbaja" name="btnbaja" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idCliente'] ?>></button>
     </form>
    </td>
  </tr>

<?php
}
}
?> 
 
  </tbody>
                      </table>
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
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
  
  
  <?php
include "../Componentes/scripts.php";
?>
  
</body>

</html>


    
        
