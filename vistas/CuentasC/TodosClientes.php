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
  else{window.location="http://localhost/Financiero/siccif/vistas/CuentasC/TodosClientes.php";}

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
          
          <!-- /Title -->
      
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
                            <th  WIDTH="100" HEIGHT='9'>Opciones</th>
                          </tr>
                        </thead>
                        
                        <tbody >
                          <?php
                            $extraer="SELECT * FROM cliente";

                             //$base=mysqli_select_db($con,'finanzas');
                            $ejecutar=mysqli_query($mysqli,$extraer);


                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            {
                              if (($ejecuta['estado'])==1) {
                              $cont=$cont+1;

                                ?> 
                                <?php ?> 
                                <?php ?>  
                              <tr>
                                <td><?php  echo $cont ?> </td>
                                 <td><?php  echo $ejecuta['nombre']." ".$ejecuta['apellido'] ?> </td>
                                <td> <?php echo $ejecuta['nit']?></td>
                                <td> <?php echo $ejecuta['ocupacion']?></td>
                                <td> <?php echo $ejecuta['depa']?></td>
                                <?php if(($ejecuta['tipo'])==1){ ?> 
                                  <?php ?> 
                                <td>Normal</td>
                                <?php }else if(($ejecuta['tipo'])==2){ ?> 
                                  <?php ?> 
                                <td>Moroso</td>
                                  <?php }else{ ?> 
                                    <?php ?> 
                                <td>Incobrable</td>
                                 <?php } ?> 
                                    <?php ?> 
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
                    
                  

 
        <!--Modal  Registrar Proveedor-->

<div id="ModalRegistarProveedor"  class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
    <div class="color-moduloInventario">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="col-md-offset-5">
        <h4 class="modal-title">Ingresar datos del proveedor</h4></div>
      </div>
      </div>
       <div class="modal-body">

 <div class="row">
  <div class="col-md-12">



<div class="col-md-8 ">

<div class="col-md-6">
<div class="input-group">

  <label for="nomb" >Nombre del Cliente:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nomb" placeholder="Nombre" name="nomb">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>

<div class="input-group">

  <label for="nit">NIT  </label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit" placeholder="" name="nit">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>


<div class="input-group">

  <label for="nit">NIT  </label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit" placeholder="" name="nit">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>

<div class="input-group">

  <label for="obs">Observaciones </label>
  <div class="input-group">
  <input type="text" class="form-control" id="obs" placeholder="" name="obs">
   <div class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></div>
  </div>
</div>

<div class="input-group">
  <label for="dir">Dirección </label>
  <div class="input-group">
  <input type="text" class="form-control" id="dir" name="dir">
  <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
  </div>
</div>
</div>






<div class="col-md-6">


<div class="input-group">

  <label for="cont" >Nombre del contacto:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="cont" placeholder="Nombre" name="cont">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>

<div class="input-group">

  <label for="tel" >Telefono:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="tel" placeholder="" name="tel">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>


<div class="input-group">
  <label for="correo">Correo electrónico </label>
  <div class="input-group">
  <input type="text" class="form-control" id="correo" name="correo">
  <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
  </div>
</div>


</div>
</div>
</div>

</div>
</div> 

<div class="modal-footer">

        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        </div>
 </div>
  
 
        </form>
      </div>
      
 </div>
          

        <!--Fin modal Registrar Proveedor-->
        
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


    
        
