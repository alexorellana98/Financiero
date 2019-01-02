<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Registrar Proveedor</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

   <script>
        $(function () {
            $.mask.definitions['~'] = "[+-]";
            $("#date").mask("99/99/9999", {completed: function () {
                    alert("completed!");
                }});
            $("#tel").mask("9999-9999");
            $("#dui").mask("09999999-9");
            $("#nit").mask("9999-999999-999-9");
            $("input").blur(function () {
                $("#info").html("Unmasked value: " + $(this).mask());
            }).dblclick(function () {
                $(this).unmask();
            });
        });
    </script>
<script language="javascript">

 function sele(){
  var cond= $("#condi").val();
  if (cond==1) {
     window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/RegistroProveedor.php";
  }else{window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/RegistroProveedorInactivo.php";}

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
//activa el activo 
$est=1;
$var=$_GET['btnalta1'];
$sql = " UPDATE proveedor set estado='$est' WHERE ide='$var'";
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
             <h3 align="center" >Registrar Proveedor</h3>
            </div>
          </div>
          <!-- /Title -->
        

        <!-- Row -->
            <div class="row">

            
                
                <div class="col-md-3">
                  <br>
                  <div class="form-group">

                    <button type="button"  class="btn btn-success " data-toggle="modal" data-target="#ModalRegistarProveedor"  >Registrar Proveedor</button>
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
              <div class="panel-heading">
                <div class="pull-left">
                  <h6 class="panel-title txt-dark">Categorias</h6>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                         <tr >
                            <th >N°</th>
                            <th >Nombre</th>
                            <th >Direccion</th>
                            <th >NIT</th>
                            <th >Nombre de contacto</th>
                            <th >Telefono</th>
                            <th >Correo</th>
                            <th >Observacion</th>
                          <th >Opciones</th>
                        </tr>
                        </thead>
                        
                        <tbody >
                          <?php
                            $extraer="SELECT * FROM proveedor";

                            // $base=mysqli_select_db($con,'finanzas');
                            $ejecutar=mysqli_query($mysqli,$extraer);


                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            {if (($ejecuta['estado'])==1) {
                              $cont=$cont+1;

                                ?>  
                              <tr>
                                <td><?php  echo $cont ?> </td>
                                <td><?php  echo $ejecuta['nombre'] ?> </td>
                                <td><?php echo $ejecuta['direccion']?></td>
                                <td> <?php echo $ejecuta['nit']?></td>
                                <td> <?php echo $ejecuta['contacto']?></td>
                                <td> <?php echo $ejecuta['telefono']?></td>
                                <td> <?php echo $ejecuta['correo']?></td>
                                <td> <?php echo $ejecuta['observacion']?></td>
                                <td>
                                 <form  action="editarProveedor.php" method="post" class="form-register" > 
                                  <button  type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['ide']?>" >Editar</button>
                                  </form>
                                  <form  style=" margin-left: 100px; margin-top:-43px;" action="RegistroProveedorInactivo.php" method="get" class="form-register" > 
                                <button  type="submit" class="btn btn-warning" id="btnbaja" name="btnbaja" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['ide'] ?>>Baja</button>
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

<div class="col-md-3 ">

<img src="../Imagen/proveedor.png" class="img-rounded" alt="Cinque Terre" width="200" height="200">
</div>

<div class="col-md-8">

<div class="col-md-6">
<div class="input-group">

  <label for="nomb" >Nombre de proveedor:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nomb" placeholder="Nombre" name="nomb" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<div class="input-group">
  <label for="dir">Dirección </label>
  <div class="input-group">
  <input type="text" class="form-control" id="dir" name="dir" required>
  <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
  </div>
</div>

<div class="input-group">

  <label for="nit">NIT  </label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit" placeholder="" name="nit" required>
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>

<div class="input-group">

  <label for="obs">Observaciones </label>
  <div class="input-group">
  <input type="text" class="form-control" id="obs" placeholder="" name="obs" required>
   <div class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></div>
  </div>
</div>

</div>






<div class="col-md-6">


<div class="input-group">

  <label for="cont" >Nombre del contacto:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="cont" placeholder="Nombre" name="cont" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>

<div class="input-group">

  <label for="tel" >Telefono:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="tel" placeholder="" name="tel" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>


<div class="input-group">
  <label for="correo">Correo electrónico </label>
  <div class="input-group">
  <input type="text" class="form-control" id="correo" name="correo" required>
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
        <!-- Fin Row -->
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


    
        
        