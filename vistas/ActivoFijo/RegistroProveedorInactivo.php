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

if (!empty($_GET['btnbaja']))  {
//Inactiva el activo 
$est=0;
$var =$_GET['btnbaja'];
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
             <h3 align="center" >Proveedor Inactivos</h3>
            </div>
          </div>
          <!-- /Title -->
        

        <!-- Row -->
            <div class="row">

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
                            {if (($ejecuta['estado'])==0) {
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
                                  <button disabled="true"  type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['ide']?>" >Editar</button>
                                   <form  style=" margin-left: 100px; margin-top:-43px;" action="RegistroProveedor.php" method="get" class="form-register" > 
                                   <button  type="submit" class="btn btn-warning" id="btnalta1" name="btnalta1" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['ide'] ?> >Alta</button>
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


    
        
        